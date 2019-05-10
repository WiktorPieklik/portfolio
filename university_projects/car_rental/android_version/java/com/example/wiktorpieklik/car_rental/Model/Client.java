package com.example.wiktorpieklik.car_rental.Model;

public class Client
{
    private int clientId;
    private String name;
    private String surname;
    private String phoneNo;
    private String identityCard;
    private String login;
    private String password;
    private String email;

    public Client(int id, String name, String surname, String phoneNo, String identityCard, String login, String password, String email)
    {
        clientId=id;
        this.name=name;
        this.surname=surname;
        this.phoneNo=phoneNo;
        this.identityCard=identityCard;
        this.login=login;
        this.password=password;
        this.email=email;
    }

    public int getClientId()
    {
        return this.clientId;
    }

    public String getClientName()
    {
        return this.name;
    }

    public String getClientSurname()
    {
        return this.surname;
    }

    public String getClientPhoneNo()
    {
        return this.phoneNo;
    }

    public String getClientIdentityCard()
    {
        return this.identityCard;
    }

    String getClientLogin()
    {
        return this.login;
    }

    String getClientPassword()
    {
        return this.password;
    }

    public String getClientEmail()
    {
        return this.email;
    }
}
