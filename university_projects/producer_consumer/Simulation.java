package producerConsumer;

import java.util.ArrayList;
import java.util.List;

import javax.swing.*;

/*
 * Plik: Simulation.java
 * 		 Glowna klasa programu
 *
 * Autor: Wiktor Pieklik
 * Data: grudzien 2018
 */

public class Simulation extends JFrame
{

    private static final long serialVersionUID = 1L;
    Display panel;
    Buffor buffor;

    public Simulation()
    {
        prepareSimulation();
    }

    private void prepareSimulation()
    {
        setSize(800,800);
        setResizable(false);
        setTitle("Producer - consumer problem      Wiktor Pieklik 2018");
        buffor = new Buffor();
        panel = new Display(buffor);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setContentPane(panel);
        setVisible(true);
        Display.producersAndConsumers = createCircles();
    }

    public List<Circle> createCircles()
    {
        List<Circle> circles = new ArrayList<>();
        for(int i=0;i<7;i++)
        {
            circles.add(new Consumer(panel, buffor));
        }

        for(int i=0;i<8;i++)
        {
            circles.add(new Producer(panel, buffor));
        }
        return circles;
    }

    public static void main(String[] args)
    {
        new Simulation();
    }
}
