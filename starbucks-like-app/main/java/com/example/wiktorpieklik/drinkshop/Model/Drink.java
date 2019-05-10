package com.example.wiktorpieklik.drinkshop.Model;

public class Drink
{
    private String Id, Name, Link, Price, MenuId;

    public Drink(){}

    public String getId()
    {
        return Id;
    }

    public void setId(String id)
    {
        Id = id;
    }

    public String getName()
    {
        return Name;
    }

    public void setName(String name)
    {
        Name = name;
    }

    public String getLink()
    {
        return Link;
    }

    public void setLink(String link)
    {
        Link = link;
    }

    public String getPrice()
    {
        return Price;
    }

    public void setPrice(String price)
    {
        Price = price;
    }

    public String getMenuId()
    {
        return MenuId;
    }

    public void setMenuId(String menuId)
    {
        MenuId = menuId;
    }
}
