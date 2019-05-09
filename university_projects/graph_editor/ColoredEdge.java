package graphEditor;

import java.awt.BasicStroke;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;

/*
 * Plik: ColoredEdge.java
 * 		 Zawiera definicje kolorowej krawedzi
 * Autor: Wiktor Pieklik
 * Data: listopad 2018
 */

/**
 * <h2>Klasa reprezentujaca kolorowa krawedz </h2>
 * @see graphEditor.Edge
 * @author Wiktor Pieklik
 * @version 2.1 listopad 2018
 */
public class ColoredEdge extends Edge
{
    private static final long serialVersionUID = 1L;
    /**
     * Zmienna przetrzymujaca kolor krawedzi
     */
    private Color color;

    /**
     * Konstruktor kolorowej krawedzi
     * @param startNode Wezel poczatkowy
     * @param endNode Wezel koncowy
     * @param color Kolor krawedzi
     * @see graphEditor.Edge#Edge(Node, Node)
     */
    public ColoredEdge(Node startNode, Node endNode, Color color)
    {
        super(startNode, endNode);
        this.color=color;
    }

    /**
     * Konstruktor kolorowej krawedzi z domyslnym kolorem czerwonym
     * @param startNode Wezel poczatkowy
     * @param endNode Wezel koncowy
     * @see graphEditor.ColoredEdge#ColoredEdge(Node, Node, Color)
     */
    public ColoredEdge(Node startNode, Node endNode)
    {
        super(startNode, endNode);
        color = Color.RED;
    }

    /**
     * Metoda ustawiajaca kolor krawedzi
     * @param color Instancja klasy Color
     */
    public void setColor(Color color)
    {
        this.color=color;
    }

    /**
     * Metoda zwracajaca kolor krawedzi
     * @return Instancja klasy Color
     */
    public Color getColor()
    {
        return color;
    }

    /**
     * Metoda rysujaca kolorowa krawedz na plaszczyznie
     */
    void draw(Graphics g)
    {
        g.setColor(color);
        ((Graphics2D)g).setStroke(new BasicStroke(2));
        g.drawLine(startNode.getX(), startNode.getY(), endNode.getX(), endNode.getY());
    }


}
