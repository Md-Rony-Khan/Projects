/*
	author: S. M. Shahriar Nirjon
	last modified: August 8, 2008
*/
# include "iGraphics.h"
# include <shellapi.h>

int blueflag=0;
int ix=888;
int iy=-50;
int ir=40;
int hx=999;
int hy=800;
int hr=30;
int gx=900;
int gy=-100;
int gr=30;
int fx=800;
int fy=750;
int fr=30;
int ex=650;
int ey=-10;
int er=30;
int dx=590;
int dy=-10;
int dr=30;
int bx=100;
int by=700;
int br=30;
int cx=250;
int cy=450;
int cr=30;
int ax=150;
int ay=-50;
int ar=30;
int xx=-5;
int xy=-5;
int xr=4;
int lx=1180;
int ly=-6;
int lw=15;
int lh=620;

int score=0;

/* 
	function iDraw() is called again and again by the system.
*/
void iDraw()
{
	//place your drawing codes here	
	iClear();

	iSetColor(0,0,255);
	iFilledCircle(ix,iy,ir);
	
	iSetColor(0,255,0);
	iFilledCircle(cx,cy,cr);
	iFilledCircle(dx,dy,dr);
	iFilledCircle(fx,fy,fr);
	iFilledCircle(gx,gy,gr);
	
	iSetColor(255,0,0);
	iFilledCircle(ax,ay,ar);
	iFilledCircle(bx,by,br);
	iFilledCircle(hx,hy,hr);
	iFilledCircle(ex,ey,er);
	
	iSetColor(400,400,400);
	iFilledCircle(xx,xy,xr);
	
	iSetColor(60,120,90);
	iFilledRectangle(lx,ly,lw,lh);

	iSetColor(0,255,255);
	char str[100];
	sprintf(str,"Score: %d",score);
	iText(1080,580,str,GLUT_BITMAP_HELVETICA_18);

	if(score<=-20){
	iSetColor(255,0,0);
	char str1[100];
	sprintf(str1,"GAME OVER");
	iText(500,300,str1,GLUT_BITMAP_TIMES_ROMAN_24);
	sprintf(str,"Your Score: %d",score);
	iText(506,260,str,GLUT_BITMAP_HELVETICA_18);
	}
}

/* 
	function iMouseMove() is called when the user presses and drags the mouse.
	(mx, my) is the position where the mouse pointer is.
*/
void iMouseMove(int mx, int my)
{
	//place your codes here
}

/* 
	function iMouse() is called when the user presses/releases the mouse.
	(mx, my) is the position where the mouse pointer is.
*/
void iMouse(int button, int state, int mx, int my)
{
	if(button == GLUT_LEFT_BUTTON && state == GLUT_DOWN && mx > 1200 && score>-20)
	{
		PlaySound("shoot.wav", NULL, SND_ASYNC);
		xx=mx;
		xy=my;
		if(xx<=0){
			xx=mx;
		    xy=my;
		}
		
	}
	if(button == GLUT_RIGHT_BUTTON && state == GLUT_DOWN)
	{
		//place your codes here	
	}
}

/*
	function iKeyboard() is called whenever the user hits a key in keyboard.
	key- holds the ASCII value of the key pressed. 
*/
void iKeyboard(unsigned char key)
{
	if(key == 'p')
	{
		iPauseTimer(0);
	}
	if(key == 'r')
	{
		iResumeTimer(0);
	}
}

/*
	function iSpecialKeyboard() is called whenver user hits special keys like-
	function keys, home, end, pg up, pg down, arraows etc. you have to use 
	appropriate constants to detect them. A list is:
	GLUT_KEY_F1, GLUT_KEY_F2, GLUT_KEY_F3, GLUT_KEY_F4, GLUT_KEY_F5, GLUT_KEY_F6, 
	GLUT_KEY_F7, GLUT_KEY_F8, GLUT_KEY_F9, GLUT_KEY_F10, GLUT_KEY_F11, GLUT_KEY_F12, 
	GLUT_KEY_LEFT, GLUT_KEY_UP, GLUT_KEY_RIGHT, GLUT_KEY_DOWN, GLUT_KEY_PAGE UP, 
	GLUT_KEY_PAGE DOWN, GLUT_KEY_HOME, GLUT_KEY_END, GLUT_KEY_INSERT 
*/
void iSpecialKeyboard(unsigned char key)
{

	if(key == GLUT_KEY_END)
	{
		exit(0);	
	}
	if(key==GLUT_KEY_LEFT){
		
	}
	if(key==GLUT_KEY_RIGHT){
		
	}
	//place your codes for other keys here
}
void ballChanger(){
	cy-=5;
	ay+=5;
	by-=5;
	dy+=5;
	ey+=5;
	fy-=5;
	gy+=5;
	hy-=5;
	

	if(blueflag==1){
		iy+=3;
	}
	
	
	if(dy>=600){
		dy=-20;
		dx=rand()%1100;
	}
	if(gy>=600){
		gy=-20;
		gx=rand()%1100;
	}
	if(ey>=600){
		ey=-40;
		ex=rand()%1100;
	}
	if(cy<=0){
		cy=690;
		cx=rand()%1100;
	}
	if(hy<=0){
		hy=620;
		hx=rand()%1100;
	}
	if(fy<=0){
		fy=750;
		fx=rand()%1100;
	}
	if(by<=0){
		by=620;
		bx=rand()%1100;
	}
	if(ay>=600){
		ay=-10;
		ax=rand()%1100;
	}
	if(xx>(cx-30) && xx<(cx+30) && xy>(cy-30) && xy<(cy+30)){
		PlaySound("bomb.wav", NULL, SND_ASYNC);
		cy=690;
		cx=rand()%1100;
		score+=10;
	}
	if(xx>(hx-30) && xx<(hx+30) && xy>(hy-30) && xy<(hy+30)){
		PlaySound("bomb.wav", NULL, SND_ASYNC);
		hy=820;
		hx=rand()%1100;
		score-=10;
	}
	if(xx>(fx-30) && xx<(fx+30) && xy>(fy-30) && xy<(fy+30)){
		PlaySound("bomb.wav", NULL, SND_ASYNC);
		fy=720;
		fx=rand()%1100;
		score+=10;
	}
	if(xx>(bx-30) && xx<(bx+30) && xy>(by-30) && xy<(by+30)){
		PlaySound("bomb.wav", NULL, SND_ASYNC);
		by=620;
		bx=rand()%1100;
		score-=10;
	}
	if(xx>(ax-30) && xx<(ax+30) && xy>(ay-30) && xy<(ay+30)){
		PlaySound("bomb.wav", NULL, SND_ASYNC);
		ay=-10;
		ax=rand()%1100;
		score-=10;
	}
	if(xx>(dx-30) && xx<(dx+30) && xy>(dy-30) && xy<(dy+30)){
		PlaySound("bomb.wav", NULL, SND_ASYNC);
		dy=-20;
		dx=rand()%1100;
		score+=10;
	}
	if(xx>(gx-30) && xx<(gx+30) && xy>(gy-30) && xy<(gy+30)){
		PlaySound("bomb.wav", NULL, SND_ASYNC);
		gy=-80;
		gx=rand()%1100;
		score+=10;
	}
	if(xx>(ex-30) && xx<(ex+30) && xy>(ey-30) && xy<(ey+30)){
		PlaySound("bomb.wav", NULL, SND_ASYNC);
		ey=-40;
		ex=rand()%1100;
		score-=10;
	}
	if(xx>(ix-40) && xx<(ix+40) && xy>(iy-40) && xy<(iy+40)){
		PlaySound("bomb.wav", NULL, SND_ASYNC);
		iy=-50;
		ix=rand()%1100;
		score+=30;
	}
	if(score<=-20){
		ar=0;
		br=0;
		cr=0;
		dr=0;
		er=0;
		fr=0;
		gr=0;
		hr=0;
		ir=0;
		xr=0;
		xx=-6;
		xy=-9;
	}

	if(score>100){
		blueflag=1;
	}
	
	if(iy>650){
		blueflag=0;
	}

}
void bullChanger(){
	xx-=6;

}

int main()
{
	//PlaySound("bomb.wav", NULL, SND_ASYNC | SND_FILENAME | SND_LOOP);

	iSetTimer(30,ballChanger);
	iSetTimer(0,bullChanger);
	//place your own initialization codes here. 
	iInitialize(1300, 600, "ronybarinovel");
	return 0;
}	