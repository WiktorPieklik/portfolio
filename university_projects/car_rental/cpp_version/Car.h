#ifndef Car_h
#define Car_h

#include "CarInfo.h"
using namespace System;
using namespace System::Windows::Forms;
ref class Car :
	public CarInfo
{
public:
	Car(String^ brand, String^ model, short productionYear, float milleage, float capacity, short powerHorse, String^ fuelType, String^ gearboxType, String^ numberPlate, int carID, Boolean isRented, Boolean inOffer);
	int getCarId();
	Boolean getCarIsRentedState();
	Boolean getCarInOfferState();
private:
	int carId;
	Boolean isRented;
	Boolean inOffer;
};
#endif
