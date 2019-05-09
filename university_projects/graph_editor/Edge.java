package graphEditor;

import java.awt.Color;
import java.awt.Graphics;
import java.io.Serializable;

/*
 * Plik: Edge.java
 * 		 Zawiera definicje zwyklej, czarnej krawedzi
 * Autor: Wiktor Pieklik
 * Data: listopad 2018
 */

/**
 * <h2>Klasa reprezentujaca zwykla, czarna krawedz grafu </h2> <br>
 * @author Wiktor Pieklik
 * @version 2.1 listopad 2018
 * @see graphEditor.ColoredEdge
 *
 */
public class Edge implements Serializable
{
    private static final long serialVersionUID = 1L;
    /**
     * Wezel, z ktorego wychodzi krawedz
     */
    protected Node startNode;
    /**
     * Wezel, do ktorego dochodzi krawedz
     */
    protected Node endNode;

    /**
     * Konstruktor prostej, czarnej krawedzi
     * @param startNode Wezel startowy krawedzi
     * @param endNode Wezel koncowy krawedzi
     */
    public Edge(Node startNode, Node endNode)
    {
        this.startNode=startNode;
        this.endNode=endNode;
    }

    /**
     * Metoda zwracajaca startowy wezel krawedzi
     * @return Wezel startowy krawedzi
     */
    public Node getStartNode()
    {
        return startNode;
    }

    /**
     * Metoda zwracajaca koncowy wezel krawedzia
     * @return Koncowy wezel krawedzi
     */
    public Node getEndNode()
    {
        return endNode;
    }

    /**
     * Metoda, ktora okresla czy kursor myszki znajduje sie nad krawedzia
     * @param mx Odcieta wskaznika myszki
     * @param my Rzedna wskaznika myszki
     * @return Wartosc true lub false
     */
    public boolean isMouseOver(int mx, int my)
    {
        double approx = 2.0, dist;

        //sprawdzenie y'ow
        if((my > startNode.getY() && my > endNode.getY()) || (my < startNode.getY() && my < endNode.getY()))
            return false;
        else
        {
            dist = Math.abs((endNode.getY() - startNode.getY()) * mx
                    - (endNode.getX() - startNode.getX()) * my + endNode.getX() * startNode.getY()
                    - endNode.getY() * startNode.getX())
                    / Math.sqrt(Math.pow((endNode.getY() - startNode.getY()), 2)
                    + Math.pow((endNode.getX() - startNode.getX()), 2));
            return dist<=approx;
        }
    }

    /**
     * Metoda, ktora rysuje krawedz
     * @param g Instancja klasy Graphics
     */
    void draw(Graphics g)
    {
        g.setColor(Color.BLACK);
        g.drawLine(startNode.getX(), startNode.getY(), endNode.getX(), endNode.getY());
    }

    /**
     * Stringowa reprezentacja krawedzi
     * @return Wspolrzedne wezla startowego i koncowego
     */
    @Override
    public String toString()
    {
        return "<"+startNode+ "," +endNode+">";
    }


}
