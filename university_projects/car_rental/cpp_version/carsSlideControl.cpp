#include "carsSlideControl.h"

carrental::carsSlideControl::carsSlideControl(void)
{
	InitializeComponent();
	//
	//TODO: W tym miejscu dodaj kod konstruktora
	//
}

carrental::carsSlideControl::~carsSlideControl()
{
	if (components)
	{
		delete components;
	}
}