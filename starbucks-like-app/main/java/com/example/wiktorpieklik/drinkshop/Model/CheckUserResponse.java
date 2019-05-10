package com.example.wiktorpieklik.drinkshop.Model;

public class CheckUserResponse
{
    private boolean exist;
    private String error_msg;

    public CheckUserResponse()
    {
    }

    public boolean isExist()
    {
        return exist;
    }

    public void setExist(boolean exist)
    {
        this.exist = exist;
    }

    public String getError_msg()
    {
        return error_msg;
    }

    public void setError_msg(String error_msg)
    {
        this.error_msg = error_msg;
    }
}
