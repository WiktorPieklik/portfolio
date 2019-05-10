package com.example.wiktorpieklik.car_rental.Model;

public class CarInfo
{
    private String brand;
    private String model;
    private int productionYear;
    private float milleage;
    private float capacity;
    private int powerhorse;
    private String fuelType;
    private String gearboxType;
    private String numberPlate;

    public CarInfo(String brand, String model, int productionYear, float milleage, float capacity, int powerhorse, String fuelType, String gearboxType, String numberPlate)
    {
        this.brand=brand;
        this.model=model;
        this.productionYear=productionYear;
        this.milleage=milleage;
        this.capacity=capacity;
        this.powerhorse=powerhorse;
        this.fuelType=fuelType;
        this.gearboxType=gearboxType;
        this.numberPlate=numberPlate;
    }

    public String getCarInfoBrand()
    {
        return this.brand;
    }

    public String getCarInfoModel()
    {
        return this.model;
    }

    public int getCarInfoProductionYear()
    {
        return this.productionYear;
    }

    public float getCarInfoMilleage()
    {
        return this.milleage;
    }

    public float getCarInfoCapacity()
    {
        return this.capacity;
    }

    public int getCarInfoPowerHorse()
    {
        return this.powerhorse;
    }

    public String getCarInfoFuelType()
    {
        return this.fuelType;
    }

    public String getCarInfoGearboxType()
    {
        return this.gearboxType;
    }

    public String getCarInfoNumberPlate()
    {
        return this.numberPlate;
    }
}
