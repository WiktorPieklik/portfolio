#include "Offer.h"

Offer::Offer(int id, float price, Car^ car) :offerId(id), offerPrice(price), car(car)
{
}


int Offer::getOfferId()
{
	return this->offerId;
}


float Offer::getOfferPrice()
{
	return this->offerPrice;
}


String^ Offer::getOfferCarBrand()
{
	return this->car->getCarInfoBrand();
}

String^ Offer::getOfferCarModel()
{
	return this->car->getCarInfoModel();
}

int Offer::getOfferCarId()
{
	return this->car->getCarId();
}