/*
	author: S. M. Shahriar Nirjon
	last modified: August 8, 2008
*/
# include "iGraphics.h"

double x;
double y;
double p;
double r;
double dx=2;
double dy=2;
double dp=2;
double dr=2;


/* 
	function iDraw() is called again and again by the system.
*/
void iDraw()
{
	//place your drawing codes here	
	iClear();
	iSetColor(200,50,100);
	iFilledCircle(x,y,20);
	iFilledCircle(p,r,20);
	//iShowBMP(x,y,"ball.bmp");
}

/* 
	function iMouseMove() is called when the user presses and drags the mouse.
	(mx, my) is the position where the mouse pointer is.
*/
void iMouseMove(int mx, int my)
{
	//place your codes here
	printf("%d %d",mx,my);
}

/* 
	function iMouse() is called when the user presses/releases the mouse.
	(mx, my) is the position where the mouse pointer is.
*/
void iMouse(int button, int state, int mx, int my)
{
	if(button == GLUT_LEFT_BUTTON && state == GLUT_DOWN)
	{
		x=mx;
		y=my;
		//place your codes here	
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
	if(key == 'q')
	{
		//do something with 'q'
	}
	//place your codes for other keys here
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
	//place your codes for other keys here
}
void myAnimation2(){
	r += dr;
	if(r<0||r>600) r=0;
}
void myAnimation1(){
	y+=dy;
	if(y>300){
	iSetTimer(150,myAnimation2);
	}
	if(y<0||y>600) y=0;
}

int main()
{
	x=100,y=0;
	p=200,r=0;
	iSetTimer(10,myAnimation1);
	
	
	//place your own initialization codes here.

	iInitialize(800, 600, "demooo");
	
	return 0;
}	