#pragma once
#ifndef Offer_h
#define Offer_h

#include "Car.h"
ref class Offer
{
public:
	Offer(int id, float price, Car^ car);
	int getOfferId();
	float getOfferPrice();
	String^ getOfferCarBrand();
	String^ getOfferCarModel();
	int getOfferCarId();
private:
	int offerId;
	float offerPrice;
	Car^ car;
};
#endif 