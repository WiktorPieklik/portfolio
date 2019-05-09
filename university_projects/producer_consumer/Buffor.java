package producerConsumer;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.font.FontRenderContext;
import java.awt.geom.Rectangle2D;

/*
 * Plik Buffor.java
 * 		Klasa reprezentujaca kolo bufora
 * 		Zawiera wszystkie metody potrzebne do pobierania i oddawania przedmiotow do bufora
 *
 * Autor: Wiktor Pieklik
 * Data: grudzien 2018
 */

public class Buffor
{
    private double x= 400.0, y= 400.0, r=150.0, capacity, storage = 0.0;
    private String percentage;
    private static final Font font = new Font("Arial",Font.BOLD,36);

    public Buffor()
    {
        capacity = Math.PI * r * r;
    }

    public double getCapacity()
    {
        return capacity;
    }

    public double getX()
    {
        return x;
    }

    public double getY()
    {
        return y;
    }

    public double getR()
    {
        return r;
    }

    public void draw(Graphics g)
    {
        //204 204 255 tlo
        //uzupelnianie 153 153 255

        percentage = String.format("%.2f%%", storage/capacity*100);

        g.setColor(new Color(204,204,255));
        g.fillOval((int)(x-r), (int)(y-r), (int)(2*r), (int)(2*r));
        double storageR = Math.sqrt(storage/Math.PI);
        g.setColor(new Color(153,153,255));
        g.fillOval((int)(x-storageR), (int)(y-storageR), (int)(2*storageR), (int)(2*storageR));

        FontRenderContext fontReaderContext = ((Graphics2D)g).getFontRenderContext();
        Rectangle2D frame = font.getStringBounds(percentage, fontReaderContext);
        g.setColor(Color.BLACK);
        g.drawString(percentage, (int)x,(int)y);

    }

    public boolean isAbleToPutItem(Circle producer)
    {
        double freeSpace = capacity - storage;
        if(producer.getVolume() > freeSpace)
            return false;

        return true;
    }

    //metoda ta wykona sie w bloku synchronicznym, wiec nie trzeba jej na tym poziomie synchronizowac
    //przed wywolaniem tej metody trzeba sprawdzic isAbleToPutItem() !!!
    public void putItem(Circle producer)
    {
        storage += producer.getVolume();
        producer.disposeItem();
    }

    public boolean isAbleToGetItem(Circle consumer)
    {
        if(storage < consumer.getVolume())
            return false;

        return true;
    }

    //metoda ta bedzie wykonywana w bloku synchronicznym, wiec nie trzeba dodawac slowa kluczowego synchronized
    //przed wywolaniem teh metody trzeba sprawdzic isAbleToGetItem() !!!!
    public void getItem(Circle consumer)
    {
        double item = consumer.getVolume();
        storage -= item;
        consumer.fillUp();

    }
}
