package graphEditor;

import java.awt.Color;
import java.awt.Graphics;
import java.io.Serializable;
/*
 Plik: Node.java
 	   Zawiera definicje zwyklego, czarnego wezla

 	   Autor:Wiktor Pieklik
 	   Data: listopad 20198
 */

/**
 *  <h2>Klasa reprezentujaca obiekt zwyklego wezla w grafie</h2> <br>
 * @author Wiktor Pieklik
 * @version 2.1 listopad 2018
 * @see graphEditor.ColoredNode
 */

public class Node implements Serializable
{
    private static final long serialVersionUID = 1L;

    /**
     * Wspolrzedna x polozenia wezla na plaszczynie
     */
    protected int x;
    /**
     * Wspolrzedna y polozenia wezla na plaszczynie
     */
    protected int y;
    /**
     * Domyslny promien wezla
     */
    private int defaultR=10;

    /**
     * Konstruktor wezla
     * @param x Wspolrzedna x wezla
     * @param y Wspolrzedna y wezla
     */
    public Node(int x, int y)
    {
        this.x=x;
        this.y=y;
    }

    /**
     * Prosty setter pozwalajacy ustawic wartosc wspolrzednej x wezla
     * @param x Odcieta wezla
     */
    public void setX(int x)
    {
        this.x=x;
    }

    /**
     * Prosty getter pozwalajacy pobrac wartosc wspolrzednej x wezla
     * @return Zwraca odcieta wezla
     */
    public int getX()
    {
        return x;
    }

    /**
     * Prosty setter pozwalajacy ustawic wartosc wspolrzednej y wezla
     * @param y Rzedna wezla
     */
    public void setY(int y)
    {
        this.y=y;
    }

    /**
     * Prosty getter pozwalajacy pobrac wartosc wspolrzednej y wezla
     * @return Rzedna wezla
     */
    public int getY()
    {
        return y;
    }

    /**
     * Metoda okreslajaca czy wskaznik myszki znajduje sie nad wezlem
     * @param mx Odcieta wskaznika myszki
     * @param my Rzedna wskaznika myszki
     * @return Wartosc true or false
     */
    public boolean isMouseOver(int mx, int my)
    {
        return (x-mx)*(x-mx)+(y-my)*(y-my)<=defaultR*defaultR;
    }

    /**
     * Metoda, ktora rysuje wezel na plaszczyznie
     * @param g Instancja klasy Graphics
     */
    void draw(Graphics g)
    {
        g.setColor(Color.BLACK);
        g.fillOval(x-defaultR, y-defaultR, 2*defaultR, 2*defaultR);
    }

    /**
     * Stringowa reprezentacja wezla
     * @return Odcieta i rzedna wezla
     */
    @Override
    public String toString()
    {
        return "("+x+", " +y+")";
    }

}
