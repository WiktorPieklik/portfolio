#include "Car.h"

Car::Car(String^ brand, String^ model, short productionYear, float milleage, float capacity, short powerHorse, String^ fuelType, String^ gearboxType, String^ numberPlate, int carID, Boolean isRented, Boolean inOffer) :CarInfo(brand, model, productionYear, milleage, capacity, powerHorse, fuelType, gearboxType, numberPlate)
{
	this->carId = carID;
	this->isRented = isRented;
	this->inOffer = inOffer;
}


int Car::getCarId()
{
	return this->carId;
}


Boolean Car::getCarIsRentedState()
{
	return this->isRented;
}


Boolean Car::getCarInOfferState()
{
	return this->inOffer;
}
