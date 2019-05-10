#include "orderSlideControl.h"

carrental::orderSlideControl::orderSlideControl(void)
{
	InitializeComponent();
	//
	//TODO: W tym miejscu dodaj kod konstruktora
	//
}

carrental::orderSlideControl::~orderSlideControl()
{
	if (components)
	{
		delete components;
	}
}
