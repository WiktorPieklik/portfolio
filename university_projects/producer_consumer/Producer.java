package producerConsumer;

import java.awt.Color;
import java.awt.Graphics;

import javax.swing.JPanel;

/*
 * Plik: Producer.java
 * 		 Zawiera implementacje dzialania watku producenta
 *
 * Autor: Wiktor Pieklik
 * Data: grudzien 2018
 */

public class Producer extends Circle
{

    public Producer(JPanel panel, Buffor buffor)
    {
        super(panel, buffor);
    }

    @Override
    public void run()
    {
        while(true)
        {
            if(!isOutsideBuffor())
            {
                synchronized(this.buffor)
                {
                    do
                    {
                        move();
                        if(isInsideBuffor() && getStorage()>0.0)
                        {
                            while(!buffor.isAbleToPutItem(this))
                            {
                                try
                                {
                                    buffor.wait();
                                }catch(InterruptedException e) {}
                            }

                            buffor.putItem(this);
                        }
                    }while(!isOutsideBuffor());
                    buffor.notifyAll();
                }

                panel.repaint();
            }
            else
            {
                move();
                //po dotknieciu ktorejs ze scian, producent pobiera produkt
                if(isTouchingBorders())
                    fillUp();
            }
        }

    }


    public void draw(Graphics g)
    {
        //pusty 255 153 153
        //pelny 255 51 51
        double contentR = Math.sqrt(getStorage()/Math.PI);
        g.setColor(new Color(255,153,153));
        g.fillOval((int)(x-r), (int)(y-r), (int)(2*r), (int)(2*r));
        g.setColor(new Color(255,51,51));
        g.fillOval((int)(x-contentR), (int)(y-contentR), (int)(2*contentR), (int)(2*contentR));
        g.drawOval((int)(x-r), (int)(y-r), (int)(2*r), (int)(2*r));
    }

}
