package producerConsumer;

import java.awt.Graphics;
import java.util.Random;

import javax.swing.JPanel;

/*
 * Plik: Circle.java
 * 		 Zawiera definicje klasy abstrakcyjnej, ktora nastepnie jest dziedziczona przez klasy: Consumer i Producer
 * 		 Zawiera wszystkie metody, jakie "kolka" potrzebuja do poprawnego dzialania
 * Autor: Wiktor Pieklik
 * Data: grudzien 2018
 */

public abstract class Circle implements Runnable
{
    protected double x,y,r, capacity, storage = 0.0, dx, dy;
    Random random = new Random();
    JPanel panel;
    Buffor buffor;

    public Circle(JPanel panel, Buffor buffor)
    {
        this.panel = panel;
        this.buffor = buffor;
        initialize();
        new Thread(this).start(); //stworzenie konsumenta lub producenta natychmiastowo uruchamia watek
    }

    private void initialize()
    {
        x = 101.0;
        y = 45.0;
        r = 12.0 + (double)random.nextInt(30);
        dx = 2.5 + (double)random.nextInt(10);
        dy = 2.9 + (double)random.nextInt(10);
        capacity = Math.PI*r*r;
    }

    public boolean isTouchingBorders()
    {
        return (x+r>=(double)panel.getWidth()) || ( x-r <= 0.0) || (y+r >=(double) panel.getHeight()) || (y-r <= 0.0);
    }

    public boolean isInsideBuffor()
    {
        double dist = Math.sqrt((x-buffor.getX())*(x-buffor.getX())+ (y-buffor.getY())*(y-buffor.getY()));

        return dist< buffor.getR() - r;
    }

    public boolean isOutsideBuffor()
    {
        double dist = Math.sqrt((x-buffor.getX())*(x-buffor.getX())+ (y-buffor.getY())*(y-buffor.getY()));

        return dist> buffor.getR() + r;
    }

    public void fillUp()
    {
        storage = capacity;
        panel.repaint();
    }

    public void disposeItem()
    {
        storage = 0.0;
        panel.repaint();
    }

    public double getStorage()
    {
        return storage;
    }

    public double getVolume()
    {
        return capacity;
    }

    public void move()
    {
        x += dx;
        y += dy;

        //gdy kulka dotknie krawedzi to nalezy zmienic kierunek jej ruchu
        if(((x-r)<= 0.0) || ((x+r) >= (double)panel.getWidth()))
            dx = -dx;

        if(((y+r) >= (double)panel.getHeight()) || ((y-r)<= 0.0))
            dy = -dy;

        panel.repaint();

        try
        {
            Thread.sleep(15);
        }catch(InterruptedException e) {}
    }

    public abstract void draw(Graphics g);

}
