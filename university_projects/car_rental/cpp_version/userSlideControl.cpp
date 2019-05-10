#include "userSlideControl.h"

carrental::userSlideControl::userSlideControl()
{
	InitializeComponent();
	//
	//TODO: W tym miejscu dodaj kod konstruktora
	//
}

carrental::userSlideControl::~userSlideControl()
{
	if (components)
	{
		delete components;
	}
}


