#ifndef CarInfo_h
#define CarInfo_h

using namespace System;
using namespace System::Windows::Forms;
ref class CarInfo
{
public:

	CarInfo(String^ brand, String^ model, short productionYear, float milleage, float capacity, short powerHorse, String^ fuelType, String^ gearboxType, String^ numberPlate);
	String^ getCarInfoBrand();
	String^ getCarInfoModel();
	short getCarInfoProductionYear();
	float getCarInfoMilleage();
	float getCarInfoCapacity();
	short getCarInfoPowerhorse();
	String^ getCarInfoFuelType();
	String^ getCarInfoGearboxType();
	String^ getCarInfoNumberPlate();

private:

	String ^ brand;
	String^ model;
	short productionYear;
	float milleage;
	float capacity;
	short powerhorse;
	String^ fuelType;
	String^ gearboxType;
	String^ numberPlate;


};

#endif
