#include "offerSlideControl.h"

carrental::offerSlideControl::offerSlideControl(void)
{
	InitializeComponent();
	//
	//TODO: W tym miejscu dodaj kod konstruktora
	//
}

carrental::offerSlideControl::~offerSlideControl()
{
	if (components)
	{
		delete components;
	}
}

