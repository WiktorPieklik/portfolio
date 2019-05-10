package com.example.wiktorpieklik.car_rental.Model;

public class Car extends CarInfo
{
    private int carId;
    private int isRented;
    private int inOffer;

    public Car(String brand, String model, int productionYear, float milleage, float capacity, int powerhorse, String fuelType, String gearboxType, String numberPlate, int carID, int isRented, int inOffer)
    {
        super(brand,model,productionYear,milleage,capacity,powerhorse,fuelType,gearboxType,numberPlate);
        this.carId=carID;
        this.isRented=isRented;
        this.inOffer=inOffer;
    }

    public int getCarId()
    {
        return this.carId;
    }

    int getCarIsRentedState()
    {
        return this.isRented;
    }

    int getCarInfoOfferState()
    {
        return this.inOffer;
    }
}
