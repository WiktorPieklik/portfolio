package graphEditor;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.font.FontRenderContext;
import java.awt.geom.Rectangle2D;
/*
 * Plik: ColoredNode.java
 * 		 Zawiera definicje kolorowego wezla
 * Autor: Wiktor Pieklik
 * Data: listopad 2018
 */

/**
 * <h2>Klasa reprezentujaca kolorowy wezel grafu </h2> <br>
 * @see graphEditor.Node
 * @author Wiktor Pieklik
 * @version 2.1 listopad 2018
 */
public class ColoredNode extends Node
{
    private static final long serialVersionUID = 1L;
    private static final Font font = new Font("Arial",Font.BOLD,14);
    /**
     * Etykieta wezla
     */
    private String content;
    /**
     * Kolor wezla
     */
    private Color color;
    /**
     * Domyslny promien wezla
     */
    private int defaultR = 20;

    /**
     * Konstruktor kolorowego wezla
     * @see graphEditor.Node#Node(int, int)
     * @param x Wspolrzedna x wezla
     * @param y Wspolrzedna y wezla
     * @param content Etykieta wezla
     * @param color Kolor wezla
     */
    public ColoredNode(int x, int y, String content, Color color)
    {
        super(x,y);
        this.content=content;
        this.color=color;
    }

    /**
     * Metoda ustawiajaca etykiete na wezle
     * @param content Tresc etykiety
     */
    public void setNodeContent(String content)
    {
        this.content=content;
    }

    /**
     * Metoda zwracajaca tresc etykiety wezla
     * @return Tresc etykiety wezla
     */
    public String getNodeContent()
    {
        return content;
    }

    /**
     * Metoda ustawiajaca kolor wezla
     * @param color Instancja klasy Color
     */
    public void setColor(Color color)
    {
        this.color=color;
    }

    /**
     * Metoda zwracajaca kolor wezla
     * @return Instancja klasy Color
     */
    public Color getColor()
    {
        return color;
    }

    /**
     * Metoda sprawdzajaca czy wskaznik myszki znajduje sie nad wezlem
     * @see graphEditor.Node#isMouseOver(int, int)
     * @return Wartosc true lub false
     */
    public boolean isMouseOver(int mx, int my)
    {
        return (x-mx)*(x-mx)+(y-my)*(y-my)<= defaultR*defaultR;
    }

    /**
     * Metoda rysujaca kolorowy wezel na plaszczynie
     */
    void draw(Graphics g)
    {
        g.setColor(color);
        g.fillOval(x-defaultR, y-defaultR, 2*defaultR, 2*defaultR);
        g.drawOval(x-defaultR, y-defaultR, 2*defaultR, 2*defaultR);
        g.setFont(font);
        g.setColor(Color.BLACK);
        FontRenderContext fontReaderContext = ((Graphics2D)g).getFontRenderContext();
        Rectangle2D frame = font.getStringBounds(content, fontReaderContext);
        g.drawString(content, x - defaultR/2, y+defaultR/4);
    }

    /**
     * Stringowa reprezentacja kolorowego wezla
     * @return Wspolrzedne x i y oraz infomacje, ze wezel jest kolorowy
     */
    @Override
    public String toString()
    {
        return "(" +x+ ", " +y+ ", kolorowa)";
    }
}
