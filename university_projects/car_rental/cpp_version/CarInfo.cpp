#include "CarInfo.h"

CarInfo::CarInfo(String^ brand, String^ model, short productionYear, float milleage, float capacity, short powerhorse, String^ fuelType, String^ gearboxType, String^ numberPlate) : brand(brand), model(model), productionYear(productionYear), milleage(milleage), capacity(capacity), powerhorse(powerhorse), fuelType(fuelType), gearboxType(gearboxType), numberPlate(numberPlate)
{

}


String^ CarInfo::getCarInfoBrand()
{
	return this->brand;
}


String^ CarInfo::getCarInfoModel()
{
	return this->model;
}


short CarInfo::getCarInfoProductionYear()
{
	return this->productionYear;
}


float CarInfo::getCarInfoMilleage()
{
	return this->milleage;
}


float CarInfo::getCarInfoCapacity()
{
	return this->capacity;
}


short CarInfo::getCarInfoPowerhorse()
{
	return this->powerhorse;
}


String^ CarInfo::getCarInfoFuelType()
{
	return this->fuelType;
}


String^ CarInfo::getCarInfoGearboxType()
{
	return this->gearboxType;
}


String^ CarInfo::getCarInfoNumberPlate()
{
	return this->numberPlate;
}
