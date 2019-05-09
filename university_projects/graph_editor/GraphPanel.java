package graphEditor;

import java.awt.Color;
import java.awt.Component;
import java.awt.Cursor;
import java.awt.Graphics;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import java.awt.event.MouseMotionListener;

import javax.swing.JColorChooser;
import javax.swing.JDialog;
import javax.swing.JMenuItem;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPopupMenu;

/*
 * Plik: GraphPanel.java
 * 		 Zajmuje sie obsluga zdarzen zwiazanych z edycja grafu (przesuwanie, dodawanie, usuwanie)
 * Autor: Wiktor Pieklik
 * Data: listopad 2018
 */
public class GraphPanel extends JPanel implements KeyListener, MouseListener, MouseMotionListener
{
    private static final long serialVersionUID = 1L;

    private int mouseX=0;
    private int mouseY=0;
    private boolean mLeftButton = false;
    private boolean mRightButton = false;
    private int mouseCursor = Cursor.DEFAULT_CURSOR;

    private Graph graph;
    private Node nodeUnderCursor = null, newEdgeNode = null;
    private Edge edgeUnderCursor = null;
    private Color color = Color.BLUE;

    public GraphPanel()
    {
        addKeyListener(this);
        addMouseListener(this);
        addMouseMotionListener(this);
        setFocusable(true);
    }

    private void setMouseCursor(int mx, int my)
    {
        nodeUnderCursor = findNode(mx,my);
        edgeUnderCursor = findEdge(mx,my);

        if(nodeUnderCursor != null)
            mouseCursor = Cursor.HAND_CURSOR;
        else if(newEdgeNode != null)
            mouseCursor = Cursor.WAIT_CURSOR;
        else if(edgeUnderCursor != null)
            mouseCursor = Cursor.CROSSHAIR_CURSOR;
        else if(mLeftButton)
            mouseCursor = Cursor.MOVE_CURSOR;
        else
            //prawy przycisk lub przesuniecie myszy -> metoda mouseMoved
            mouseCursor = Cursor.DEFAULT_CURSOR;

        setCursor(Cursor.getPredefinedCursor(mouseCursor));
        mouseX = mx;
        mouseY = my;
    }

    private void setMouseCursor(MouseEvent event)
    {
        setMouseCursor(event.getX(), event.getY());
    }

    public void setGraph(Graph graph)
    {
        setCursor(Cursor.getDefaultCursor());

        this.graph = graph;
        edgeUnderCursor = null;
        nodeUnderCursor = null;
        repaint();
    }

    public Graph getGraph()
    {
        return graph;
    }

    void moveEdge(int dx, int dy, Edge edge)
    {
        //krawedz zawiera polozenie wezlow, wiec wystarczy przesunac jej wezly i po repaint() sie zaaktualizuje
        moveNode(dx, dy, edge.getStartNode());
        moveNode(dx, dy, edge.getEndNode());
        repaint();

    }

    void moveNode(int dx, int dy, Node node)
    {
        node.setX(node.getX() + dx);
        node.setY(node.getY() + dy);
        repaint();
    }

    void moveNodes(int dx, int dy)
    {
        for(Node node : graph.getNodes())
            moveNode(dx, dy, node);
        repaint();
    }

    Node findNode(int mx, int my)
    {
        for(Node node : graph.getNodes())
        {
            if(node.isMouseOver(mx, my))
            {
                return node;
            }
        }
        return null;
    }

    Node findNode(MouseEvent event)
    {
        return findNode(event.getX(), event.getY());
    }

    Edge findEdge(int mx, int my)
    {
        for(Edge edge : graph.getEdges())
        {
            if(edge.isMouseOver(mx, my))
                return edge;
        }
        return null;
    }

    Edge findEdge(MouseEvent event)
    {
        return findEdge(event.getX(), event.getY());
    }

    @Override
    protected void paintComponent(Graphics g)
    {
        super.paintComponent(g);
        if(graph != null)
            graph.draw(g);
    }

    @Override
    public void mouseDragged(MouseEvent event)
    {
        if(mLeftButton)
        {
            if(edgeUnderCursor != null)
                moveEdge(event.getX() - mouseX, event.getY() - mouseY, edgeUnderCursor);
            else if(nodeUnderCursor != null)
                moveNode(event.getX() - mouseX, event.getY() - mouseY, nodeUnderCursor);
            else
                moveNodes(event.getX() - mouseX, event.getY() - mouseY);
        }

        mouseX = event.getX();
        mouseY = event.getY();
    }

    @Override
    public void mouseMoved(MouseEvent event)
    {
        setMouseCursor(event);
    }

    @Override
    public void mouseClicked(MouseEvent event)
    {
        setMouseCursor(event);
        if(event.getButton() == 1) //lpm
        {
            if(newEdgeNode != null && nodeUnderCursor != null && newEdgeNode != nodeUnderCursor)
            {
                String[] type = new String[] {"Czarna krawedz", "Kolorowa krawedz"};
                String answer = (String)JOptionPane.showInputDialog(this, "Wybierz rodzaj krawedzi", "Nowa krawedz", JOptionPane.DEFAULT_OPTION,null, type, type[0]);
                if(answer != null)
                {
                    if(answer.equals("Czarna krawedz"))
                        graph.addEdge(new Edge(newEdgeNode, nodeUnderCursor));
                    else
                        graph.addEdge(new ColoredEdge(newEdgeNode, nodeUnderCursor, color));
                }
                repaint();
                newEdgeNode = null;
            }
        }
    }

    @Override
    public void mouseEntered(MouseEvent event)
    {

    }

    @Override
    public void mouseExited(MouseEvent event)
    {
        // TODO Auto-generated method stub

    }

    @Override
    public void mousePressed(MouseEvent event)
    {
        if(event.getButton() == 1)
            mLeftButton = true;
        if(event.getButton() == 3)
            mRightButton = true;

    }

    @Override
    public void mouseReleased(MouseEvent event)
    {
        if(event.getButton() == 1)
            mLeftButton = false;
        if(event.getButton() == 3)
            mRightButton = false;

        setMouseCursor(event);

        //zablokowanie opcji otworzenia popup'u gdy tworzymy nowa krawedz z wezla
        if(newEdgeNode == null)
        {
            if(event.getButton() == 3) //ppm
            {
                if(nodeUnderCursor != null)
                    showPopup(event, nodeUnderCursor);
                else if(edgeUnderCursor != null)
                    showPopup(event, edgeUnderCursor);
                else
                    showPopup(event);
            }
        }
        //dopisac reszte lol

    }

    private void showPopup(MouseEvent event)
    {
        JPopupMenu popup = new JPopupMenu();
        JMenuItem item = new JMenuItem("Nowy wezel");
        item.addActionListener((lala) ->
        {
            String[] type = new String[] {"Czarny wezel", "Kolorowy wezel"};
            String answer =(String) JOptionPane.showInputDialog(null, "Wybierz typ wezla", "Wybor typu wezla", JOptionPane.QUESTION_MESSAGE, null,type,type[0]);
            if(answer != null)
            {
                if(answer.equals("Czarny wezel"))
                    graph.addNode(new Node(event.getX(),event.getY()));
                else
                    graph.addNode(new ColoredNode(event.getX(),getY(),"Nazwa",color));
            }

            repaint();
        });
        popup.add(item);
        popup.show(event.getComponent(), event.getX(), event.getY());
    }

    private void showPopup(MouseEvent event, Edge edge)
    {
        JPopupMenu popup = new JPopupMenu();
        JMenuItem item = new JMenuItem("Usun krawedz");
        item.addActionListener((nanana) ->
        {
            graph.removeEdge(edge);
            repaint();
        });
        popup.add(item);
        if(edge instanceof ColoredEdge)
        {
            item = new JMenuItem("Zmien kolor");
            item.addActionListener((blinks) ->
            {
                chooseColor(this);
                ((ColoredEdge)edge).setColor(color);
                repaint();
            });
        }
        popup.add(item);
        popup.show(event.getComponent(), event.getX(), event.getY());
    }

    private void showPopup(MouseEvent event, Node node)
    {
        JPopupMenu popup = new JPopupMenu();
        JMenuItem item = new JMenuItem("Usun wezel");
        item.addActionListener((lolol) ->
        {
            graph.removeNode(node);
            repaint();
        });
        popup.add(item);

        item = new JMenuItem("Stworz krawedz z tego wezla");
        item.addActionListener((haha) ->
        {
            newEdgeNode = node;
            mouseCursor = Cursor.WAIT_CURSOR;
        });
        popup.add(item);

        if(node instanceof ColoredNode)
        {
            item = new JMenuItem("Zmien kolor wezla");
            item.addActionListener((hihi) ->
            {
                chooseColor(this);
                ((ColoredNode)node).setColor(color);
                repaint();
            });
            popup.add(item);

            item = new JMenuItem("Zmien nazwe");
            item.addActionListener((hoho) ->
            {
                String content = (String) JOptionPane.showInputDialog(this, "Podaj nazwe", "Zmiana nazwy wezla", JOptionPane.QUESTION_MESSAGE);
                if(content != null)
                    ((ColoredNode)node).setNodeContent(content);
                repaint();
            });

            popup.add(item);
        }

        popup.show(event.getComponent(), event.getX(), event.getY());
    }

    private void chooseColor(Component context)
    {
        JColorChooser colorChooser = new JColorChooser();
        colorChooser.setPreviewPanel(new JPanel());
        JDialog dialog = JColorChooser.createDialog(context, "Wybierz kolor", true, colorChooser, (accepted)->
                {
                    color = colorChooser.getColor();
                    colorChooser.setVisible(false);
                }
                , (cancelled)->
                {
                    colorChooser.setVisible(false);
                });

        dialog.setVisible(true);
    }

    @Override
    public void keyPressed(KeyEvent event)
    {
        int move;
        if(event.isShiftDown())
            move = 5;
        else
            move = 1;

        switch(event.getKeyCode())
        {

            case KeyEvent.VK_UP:
                moveNodes(0, -move);
                break;
            case KeyEvent.VK_DOWN:
                moveNodes(0, move);
                break;
            case KeyEvent.VK_RIGHT:
                moveNodes(move, 0);
                break;
            case KeyEvent.VK_LEFT:
                moveNodes(-move, 0);
                break;
            case KeyEvent.VK_DELETE:
                if(nodeUnderCursor != null)
                {
                    graph.removeNode(nodeUnderCursor);
                    nodeUnderCursor = null;
                }

                if(edgeUnderCursor != null)
                {
                    graph.removeEdge(edgeUnderCursor);
                    edgeUnderCursor = null;
                }
                break;
        }
        //graf mogl sie przesunac, tzreba zaktualizowac cursor z obecnym polozeniem myszki
        repaint();
        setMouseCursor(mouseX, mouseY);

    }

    @Override
    public void keyReleased(KeyEvent event)
    {
        char czarus = event.getKeyChar();

        if(nodeUnderCursor != null)
        {
            if(nodeUnderCursor instanceof ColoredNode)
            {
                switch(czarus)
                {
                    case 'r':
                        ((ColoredNode) nodeUnderCursor).setColor(Color.RED);
                        break;
                    case 'g':
                        ((ColoredNode) nodeUnderCursor).setColor(Color.GREEN);
                        break;
                    case 'b':
                        ((ColoredNode) nodeUnderCursor).setColor(Color.BLACK);
                        break;
                }
                repaint();
            }
        }

        if(edgeUnderCursor != null)
        {
            if(edgeUnderCursor instanceof ColoredEdge)
            {
                switch(czarus)
                {
                    case 'r':
                        ((ColoredEdge) edgeUnderCursor).setColor(Color.RED);
                        break;
                    case 'g':
                        ((ColoredEdge) edgeUnderCursor).setColor(Color.GREEN);
                        break;
                    case 'b':
                        ((ColoredEdge) edgeUnderCursor).setColor(Color.BLACK);
                        break;
                }
                repaint();
            }
        }

    }

    @Override
    public void keyTyped(KeyEvent event)
    {
        // TODO Auto-generated method stub

    }
}
