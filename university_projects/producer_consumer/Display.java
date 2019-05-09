package producerConsumer;

import java.awt.Graphics;
import java.util.Iterator;
import java.util.List;

import javax.swing.JPanel;

/*
 * Plik Display.java
 * 		Jest to reprezentacja panelu calej symulacji
 * 		Wystwietla wszystkie watki i bufor
 *
 * Autor: Wiktor Pieklik
 * Data: grudzien 2018
 */

public class Display extends JPanel
{
    private static final long serialVersionUID = 1L;
    static List<Circle> producersAndConsumers;
    Buffor buffor;

    public Display(Buffor buffor)
    {
        this.buffor = buffor;
    }

    @Override
    public void paintComponent(Graphics g)
    {
        super.paintComponent(g);
        buffor.draw(g);
        Iterator<Circle> circles = producersAndConsumers.iterator();

        while(circles.hasNext())
        {
            Circle circle = circles.next();
            circle.draw(g);
        }
    }
}
