
.model small
.stack 100h 
.data
sc_p2 db 0 
sc_p1 db 0

x db 36 
x2 db 60
y2 db 1
y db 1

dis db "              PING PONG                 ",13
    db "Player1 Score:         Player2 Score: ",0 
dis_color db 181
dis_x db 20
dis_y db 0

 bcol_min dw 0
 bcol_max dw 0
                                  
p1_col_min dw 0
p1_col_max dw 0 

p2_col_min dw 0
p2_col_max dw 0
      
bnd_xmin dw 20
bnd_xmax dw 620

bnd_ymin dw 69
bnd_ymax dw 456

p1m_count dw 130
p2m_count dw 130

p1_count dw 0
p1r_count dw 0

p2_count dw 0
p2r_count dw 0

p1_row dw 10
p1_col dw 100 

p2_row dw 630
p2_col dw 100

bcol dw 200
brow dw 300
bcount dw 0

tik dw ?
cnt db 16
key db ?
flag db ?
new dw ?,?
old dw ?,?


.code
proc main
mov dx,@data
mov ds,dx


mov ah,0 ;graphics mode set
mov al,12h
int 10h 

call display

;mov ah,0BH
;mov bx,9
;int 10h

;mov ah,09h
;mov al,32
;mov bl,70h
;mov cx,160d
;int 10h
 
call draw_paddle1 

call draw_paddle2

call drawball 

call draw_boundary

call moveball
;call move_paddle


mov ah,4ch
int 21h
 
 ret
endp main 



proc draw_boundary 
    
    mov cx,bnd_xmin 
    bnd1:
     mov ah,0ch
     mov al,2
     mov dx,bnd_ymin
     int 10h
     inc cx
     cmp cx,bnd_xmax
     jle bnd1
     
    ;;;;;;Last boundary;;;;;;;
    
    
    mov cx,bnd_xmin
    sub bnd_ymin,1 
    bnd11:
     mov ah,0ch
     mov al,8
     mov dx,bnd_ymin
     int 10h
     inc cx
     cmp cx,bnd_xmax
     jle bnd11
    
    

   ;;;;;;Last boundary;;;;;;;
      
    mov cx,bnd_xmin
      
    bnd2:          
    mov ah,0ch
    mov al,2
    mov dx,bnd_ymax
    int 10h
    inc cx
    cmp cx,bnd_xmax
    jle bnd2 
    
    ;;;;;;Last boundary;;;;;;;
      
    mov cx,bnd_xmin
    add bnd_ymax,1  
    bnd22:          
    mov ah,0ch
    mov al,8
    mov dx,bnd_ymax
    int 10h
    inc cx
    cmp cx,bnd_xmax
    jle bnd22
    
 ret
 
endp draw_boundary

proc moveball 
    
  call cycleA1
   ret 
   
endp moveball 

proc cycleA1
     
  L2: 
  
 call removeball
 
 add brow,8 
 sub bcol,10
 int 10h

 call drawball
 
 call move_paddle
 
  cmp bcol,70
  je chv_ymin_lr
  jmp L2
  
   chv_ymin_lr:
      call cycleA2
 ret
endp cycleA1


proc cycleA2
      
      call removeball
      add brow,8
      add bcol,10
      call drawball
      cmp bcol,70
      jl L2_ymin_lr
      
  
  L2_ymin_lr:
      call removeball
      add brow,8
      add bcol,10
      call drawball
      call move_paddle
      
      cmp brow,620   
      je change_value_xmax
     
      jmp L2_ymin_lr
      
      change_value_xmax:   ;;paddle touch check
            mov dx,bcol_max
            cmp dx,p2_col_min
            jl Score 
            mov dx,bcol_min
            cmp dx,p2_col_max
            jg Score 
            call cycleA3
            
       Score:
           call player1
           call removeball
           mov bcol,200
           mov brow,300
            call moveball
           
  ret 
       
endp cycleA2


 proc cycleA3
         
      ;change_value_xmax:
           call removeball
           sub brow,8
           add bcol,10
           call drawball           
           cmp brow,620
           jl L2_xmax
 
  L2_xmax:
      call removeball
      sub brow,8
      add bcol,10
      call drawball
      call move_paddle
      
      cmp bcol,450
      je change_value_ymax

      jmp L2_xmax
      
      change_value_ymax:
         call cycleA4
         
 ret
 endp cycleA3
 
 proc cycleA4
         
      ;change_value_ymax:
               call removeball
               sub brow,8
               sub bcol,10
               call drawball                              
               cmp bcol,450
               jl L2_ymax    
               
               
   L2_ymax:
         call removeball
         sub brow,8
         sub bcol,10
         call drawball
         call move_paddle 
         
         cmp bcol,70
         je chv_ymin_rl
         
         cmp brow,20
         je change_value_xmin 
      
         jmp L2_ymax 
         
         
         chv_ymin_rl:
            call cycleB1
            
         change_value_xmin:
            mov dx,bcol_max
            cmp dx,p1_col_min
            jl Score2 
            mov dx,bcol_min
            cmp dx,p1_col_max
            jg Score2
            call cycleA5 
       Score2:
        call player2    
        call removeball
        mov bcol,200
        mov brow,300
        call moveball
             
 ret
endp cycleA4


proc cycleA5
                
         ;change_value_xmin:
           call removeball
           add brow,8
           sub bcol,10
           call drawball
           cmp brow,20
          jl L2_xmin
           
      L2_xmin:
      call removeball
      add brow,8
      sub bcol,10
      call drawball
      call move_paddle 
      ;;;start from top,first cycle complete
      cmp bcol,70
      je chv_ymin_rl2
      jmp L2_xmin
        
      chv_ymin_rl2 :
           call cycleA2 
           
ret
endp cycleA5





;............cycleA..........;

proc cycleB1
               
     ;chv_ymin_rl:
      call removeball
      sub brow,8
      add bcol,10
      call drawball
      cmp bcol,70
      jl L2_ymin_rl
      
    L2_ymin_rl:
       call removeball
      sub brow,8
      add bcol,10
      call drawball
      call move_paddle
      cmp brow,20   
      je chv_xmax_ud
      jmp L2_ymin_rl
      
       chv_xmax_ud:
             mov dx,bcol_max
            cmp dx,p1_col_min
            jl Score3 
            mov dx,bcol_min
            cmp dx,p1_col_max
            jg Score3
           call cycleB2
        Score3:
           call player2 
           call removeball
           mov bcol,200
           mov brow,300
           call moveball
           
           
ret
endp  cycleB1

proc cycleB2
          
         ; chv_xmax_ud:
           call removeball
           add brow,8
           add bcol,10
           call drawball           
           cmp brow,20    ;checking condiotion
           jl L2_xmax_ud
           
      L2_xmax_ud:
          call removeball
           add brow,8
           add bcol,10
           call drawball
           cmp bcol,450
           je chv_ymax_lr
           jmp L2_xmax_ud
           
           chv_ymax_lr:
               call cycleB3
ret
endp  cycleB2           
           
proc cycleB3
    
           
        ;chv_ymax_lr:
             call removeball
               add brow,8
               sub bcol,10
               call drawball                              
               cmp bcol,450
               jl L2_ymax_lr
                   
           
      L2_ymax_lr:
      call removeball
      add brow,8
      sub bcol,10
      call drawball
      call move_paddle
  
;new      
      cmp bcol,70
      je chv_ymin_lr2 
      
      cmp brow,620   
      je chv_xmax_du

      jmp L2_ymax_lr
      
      chv_ymin_lr2:
            call cycleA2;;;;mising
      
      chv_xmax_du:
             mov dx,bcol_max
            cmp dx,p2_col_min
            jl Score4 
            mov dx,bcol_min
            cmp dx,p2_col_max
            jg Score4
           call cycleB4 
        Score4:
          call player1
           call removeball
           mov bcol,200
           mov brow,300
           call moveball 
            
      
ret
endp  cycleB3      
      

      
proc cycleB4
          
      ; chv_xmax_du:
           call removeball
           sub brow,8
           sub bcol,10
           call drawball
           cmp brow,620
           jl L2_xmax_du     
           
 
  L2_xmax_du:
      call removeball
      sub brow,8
      sub bcol,10
      call drawball
      call move_paddle 
      
      cmp bcol,70
      je chv_ymin_rl3
      
      jmp L2_xmax_du
         
      chv_ymin_rl3:
         call cycleC1     
 
ret
endp  cycleB4
 
 
 
proc cycleC1
          
      ; chv_ymin_rl2:
      call removeball
      sub brow,8
      add bcol,10
      call drawball
      cmp bcol,70
      jl L2_ymin_rl2
      
       L2_ymin_rl2:
      call removeball
      sub brow,8
      add bcol,10
      call drawball
      call move_paddle
      
      cmp brow,20   
      je change_value_xmin1
      
      cmp bcol,450 ;70
      je  chv_ymin_
      
      jmp L2_ymin_rl2
      
      change_value_xmin1:
             mov dx,bcol_max
            cmp dx,p1_col_min
            jl Score5 
            mov dx,bcol_min
            cmp dx,p1_col_max
            jg Score5
           call cycleB2;cycleA4
           
      Score5:
       call player2
        call removeball
        mov bcol,200
         mov brow,300
          call moveball     
      chv_ymin_:
          call cycleA4;B1
      
ret
endp  cycleC1 
 



proc move_paddle
 ;waits for a key press
    mov ah,00h
    int 16h
    
    ;compare the al registr to see what key the user press
    
    ;if 's'
    cmp al,'s'
    je Down
    
    cmp al,'w'
    je Up  
    
    
     cmp al,'j'
    je Down_p2
    
    cmp al,'u'
    je Up_p2 
    
    cmp al,'q'
    je quit

    ;jmp move_paddle  
    
      quit:
       mov ah,4ch
       int 21h
           
          
    Down:
         cmp p1_col,390
         jge dmd 
         
         call rmv_p1
         
          
         
         add p1_col,30
         ;add p1m_count,30 
         int 10h 
          
         call draw_paddle1
        ; call moveball
         ;jmp move_paddle
     ret
     
      dmd: 
        ret
         
    Up:  
         cmp p1_col,70
         jle dmu
         
    
         
          call rmv_p1
          
        
         
         sub p1_col,30
         sub p1m_count,30
         
         
         int 10h      
         
         
         call draw_paddle1
         
         ;call moveball
         
         ;jmp move_paddle
        ret
        dmu: 
          ret             
             
             
    Down_p2: 
    
            
         cmp p2_col,390
         jge dmd2
         
         call rmv_p2  
         
                
          
         add p2_col,30
         add p2m_count,30
          
     
         
         
         int 10h      
         
         
         call draw_paddle2
         
        ; call moveball
         
         ;jmp move_paddle
         ret
         dmd2:
            ret         
    Up_p2:
    
         cmp p2_col,70
         jle dmu2 
                   
          call rmv_p2 

         
         sub p2_col,30 
         sub p2m_count,30
         
      
         
         int 10h      
         
         
         call draw_paddle2 
         
         ;call moveball
         
         ;jmp move_paddle
        ret
        dmu2:
         ret        
     
             
             
 ret
 endp move_paddle

 proc draw_paddle1 
 mov ah,0CH
 mov al,13
 mov dx,p1_col
 mov cx,p1_row
 mov p1_col_min,dx
 ;
 mov p1_count,0 
 ;
 int 10h
 L1:
 inc cx
 int 10h
 inc cx
 int 10h 
 
 inc cx
 int 10h
 inc cx
 int 10h 
 
 inc cx
 int 10h
 inc cx
 int 10h
 
 inc cx
 int 10h
 inc cx
 int 10h
 
 
 
 
; cmp dx,p_count
 cmp p1_count,30

 je exit
 
 mov cx,p1_row
 inc dx
 ;
 inc p1_count 
 ;
 int 10h
 int 10h 
 
 mov p1_col_max,dx
 jmp L1 
 

 exit:
 ret
endp draw_paddle1 

proc draw_paddle2
 mov ah,0CH
 mov al,13
 mov dx,p2_col
 mov cx,p2_row
 mov p2_col_min,dx
 ;
 mov p2_count,0
 ;
 int 10h
 L1_p2:
 dec cx
 int 10h
 dec cx
 int 10h 
 
 dec cx
 int 10h
 dec cx
 int 10h 
 
 dec cx
 int 10h
 dec cx
 int 10h
 
 dec cx
 int 10h
 dec cx
 int 10h
 
 
 
 
; cmp dx,p_count

 cmp p2_count,30
 ;
 je exit
 
 mov cx,p2_row
 inc dx
 inc p2_count
 int 10h
 ;int 10h 
 mov p2_col_max,dx
 
 jmp L1_p2 
 

 exit_p2:
 ret
endp draw_paddle2

proc rmv_p1
 mov ah,0CH
 mov al,0
 mov dx,p1_col
 mov cx,p1_row 
 ;
 mov p1r_count,0
 ;
 int 10h
 L1_rp1:
 inc cx
 int 10h
 inc cx
 int 10h 
 
 inc cx
 int 10h
 inc cx
 int 10h 
 
 inc cx
 int 10h
 inc cx
 int 10h
 
 inc cx
 int 10h
 inc cx
 int 10h
 
 
 
 
 ;cmp dx,p_count
 cmp p1r_count,30
 ;
 je exit_rp1
 
 mov cx,p1_row
 inc dx
 ;
 inc p1r_count
 ;
 int 10h
 int 10h 

 jmp L1_rp1 
 

 exit_rp1:
 ret
endp rmv_p1

proc rmv_p2
 mov ah,0CH
 mov al,0
 mov dx,p2_col
 mov cx,p2_row
 ;
 mov p2r_count,0
 ;
 int 10h
 L1_rp2:
 dec cx
 int 10h
 dec cx
 int 10h 
 
 dec cx
 int 10h
 dec cx
 int 10h 
 
 dec cx
 int 10h
 dec cx
 int 10h
 
 dec cx
 int 10h
 dec cx
 int 10h
 
 
 
 
 ;cmp dx,p_count 
 cmp p2r_count,30
 ;
 je exit_rp2
 
 mov cx,p2_row
 inc dx
 inc p2r_count
 int 10h
 ;int 10h 

 jmp L1_rp2 
 

 exit_rp2:
 ret
endp rmv_p2

drawball proc
 mov ah,0CH
 mov al,14
 mov cx,brow
 mov dx,bcol
 mov bcol_min,dx
 mov bcount,0
 int 10h
 L1_b:
 inc cx
 int 10h
 inc cx
 int 10h 
 
 inc cx
 int 10h
 inc cx
 int 10h 
 
 inc cx
 int 10h
 inc cx
 int 10h
 
 inc cx
 int 10h
 inc cx
 int 10h
 
 
 
 
 cmp bcount,5
 je exit_b
 
 mov cx,brow
 inc bcount
 inc dx
 int 10h
 ;int 10h 
 
 mov bcol_max,dx
 jmp L1_b 
 

 exit_b:
 ret
 
endp drawball 

dely proc
 mov ax,00H
 int 1ah
 mov tik,dx
 add tik,0h
 delay:
 mov ax,00H
 int 1ah
 cmp tik,dx
 jge delay
 ret
 
 dely endp 


removeball proc
 mov ah,0CH
 mov al,0
 mov cx,brow
 mov dx,bcol
 mov bcount,0
 int 10h
 L3:
 inc cx
 int 10h
 inc cx
 int 10h 
 
 inc cx
 int 10h
 inc cx
 int 10h 
 
 inc cx
 int 10h
 inc cx
 int 10h
 
 inc cx
 int 10h
 inc cx
 int 10h
 

 
 cmp bcount,5
 je finish
 
 mov cx,brow
 inc bcount
 inc dx
 int 10h
 ;int 10h 
 
 
 jmp L3 
 
 
 finish: 
 ret
 
 
endp removeball 
proc player1 
    call gotoxy1
    add sc_p1,1
    mov al,sc_p1
    add al,48d
    call char_display1
    ret
endp player1

proc player2 
     
       call gotoxy2
    add sc_p2,1
    mov al,sc_p2
    add al,48d
    call char_display2  
    ret
endp player2 

proc char_display1
  mov  ah, 9
  mov  bh, 0
  mov  bl, 4 ;ANY COLOR.
  mov  cx, 1  ;HOW MANY TIMES TO DISPLAY CHAR.
  int  10h
  ret
endp  char_display1   

;-------------------------------------------------     
proc gotoxy1
 
  mov dl, x
  mov dh, y
  mov ah, 2 ;SERVICE TO SET CURSOR POSITION.
  mov bh, 0 ;PAGE.
  int 10h   ;BIOS SCREEN SERVICES.  
  ret
endp gotoxy1

proc char_display2
  mov  ah, 9
  mov  bh, 0
  mov  bl, 4 ;ANY COLOR.
  mov  cx, 1  ;HOW MANY TIMES TO DISPLAY CHAR.
  int  10h
  ret
endp char_display2   

;-------------------------------------------------     
proc gotoxy2
 
  mov dl, x2
  mov dh, y2
  mov ah, 2 ;SERVICE TO SET CURSOR POSITION.
 ; mov bh, 0 ;PAGE.
  int 10h   ;BIOS SCREEN SERVICES.  
  ret
endp  gotoxy2

proc display 

  mov  di, offset dis
while:      
  call gotoxy  ;SET CURSOR POSITION FOR CURRENT CHAR.
  mov  al, [ di ]  ;CHAR TO DISPLAY.
  cmp  al, 13  ;IF CHAR == 13
  je linebreak
  cmp al,0   
  je   finish3  ;THEN JUMP TO FINISH.
  call char_display  ;DISPLAY CHAR IN AL WITH "COLOR".
  inc  dis_x  ;NEXT CHARACTER GOES TO THE RIGHT.
  jmp  next_char
linebreak:  
  inc  dis_y  ;MOVE TO NEXT LINE.    
  mov  dis_x, 20  ;X GOES TO THE LEFT  
next_char:
  inc  di  ;NEXT CHAR IN "JAN".
  jmp  while

finish3:      

;-------------------------------------------------     
;DISPLAY ONE CHARACTER IN "AL" WITH "COLOR".
  
ret
endp display

proc char_display
  mov  ah, 9
  mov  bh, 0
  mov  bl, dis_color  ;ANY COLOR.
  mov  cx, 1  ;HOW MANY TIMES TO DISPLAY CHAR.
  int  10h
  ret
endp char_display   

;-------------------------------------------------     
proc gotoxy
  mov dl, dis_x
  mov dh, dis_y
  mov ah, 2 ;SERVICE TO SET CURSOR POSITION.
  mov bh, 0 ;PAGE.
  int 10h   ;BIOS SCREEN SERVICES.  
  ret
endp gotoxy

END MAIN

