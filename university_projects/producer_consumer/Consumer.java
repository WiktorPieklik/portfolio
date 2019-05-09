package producerConsumer;

import java.awt.Color;
import java.awt.Graphics;

import javax.swing.JPanel;

/*
 * Plik: Consumer.java
 * 		 Zawiera implementacje dzialania watku konsumenta
 *
 * Autor: Wiktor Pieklik
 * Data: grudzien 2018
 */

public class Consumer extends Circle
{

    public Consumer(JPanel panel, Buffor buffor)
    {
        super(panel, buffor);
    }


    public void draw(Graphics g)
    {
        double contentR = Math.sqrt(getStorage()/Math.PI);
        // 102 178 255 pelny
        //204 229 255 pusty
        g.setColor(new Color(204,229,255));
        g.fillOval((int)(x-r), (int)(y-r), (int)(2*r), (int)(2*r));
        g.setColor(new Color(102,178,255));
        g.fillOval((int)(x-contentR), (int)(y-contentR), (int)(2*contentR), (int)(2*contentR));
        g.drawOval((int)(x-r), (int)(y-r), (int)(2*r), (int)(2*r));
    }

    @Override
    public void run()
    {
        while(true)
        {
            //sprawdza czy jest wewnatrz bufora lub czy sie styka krawedziami z zewnatrz (przypadek gdy dist == r1+r2)
            if(!isOutsideBuffor())
            {
                //synchronizacja odbywa sie w tym momencie, gdyz po buforze moze poruszac sie tylko jedno kolko
                //ale chcemy tez aby wszystkie inne kolka poza buforem sie poruszaly, stad warunek if na poczatku,
                //a blok synchroniczny w srodku niej
                synchronized(this.buffor)
                {
                    do
                    {
                        move();

                        //pobrac produkt moze tylko wtedy gdy jest w srodku i gdy pole storage jest rowne 0
                        // jezeli jest w srodku, ale nie pobral produktu to po prostu przejdzie przez buffor
                        if(isInsideBuffor() && getStorage() == 0.0)
                        {
                            while(!buffor.isAbleToGetItem(this))
                            {
                                try
                                {
                                    buffor.wait();
                                }catch(InterruptedException e)
                                {
                                    //lapanie wyjatku
                                }
                            }

                            buffor.getItem(this);
                        }

                    }while(!isOutsideBuffor());
                    buffor.notifyAll();
                }

            }
            //konsument jest poza buforem
            else
            {
                move();
                //po dotkniecu ktorejs ze scian, konsument oddaje produkt
                if(isTouchingBorders())
                    disposeItem();
            }
        }
    }
}
