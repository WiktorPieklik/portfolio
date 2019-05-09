package graphEditor;


import java.awt.Graphics;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.io.Serializable;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

/*
 * Plik: Graph.java
 * 		 Zawiera definicje grafu
 * Autor: Wiktor Pieklik
 * Data: listopad 2018
 */

/**
 * <h2>Klasa reprezentujaca graf </h2>
 * @author Wiktor Pieklik
 * @version 2.1 listopad 2018
 */
public class Graph implements Serializable
{
    private static final long serialVersionUID = 1L;

    /**
     * Lista wszystkich wezlow grafu
     */
    private List<Node> nodes = new ArrayList<>();
    /**
     * Lista wszystkich krawedzi grafu
     */
    private List<Edge> edges = new ArrayList<>();

    /**
     * Metoda dodajaca wezel do grafu
     * @param node Wezel do dodania
     */
    public void addNode(Node node)
    {
        nodes.add(node);
    }

    /**
     * Metoda usuwajaca wezel z grafu
     * @param node Wezel do usuniecia
     */
    public void removeNode(Node node)
    {
        Iterator edgeIterator = edges.iterator();
        Edge edgeToRemove;
        boolean found = false;

        while(true)
        {
            do
            {
                //usuwanie nastepuje dopiero wtedy gdy sprawdzimy wszystkie krawedzie
                if(!edgeIterator.hasNext())
                {
                    nodes.remove(node);
                    return;
                }

                edgeToRemove = (Edge)edgeIterator.next();
                //jesli wezel startowy lub koncowy bedzie wezlem do usuniecia to znalezlismy krawedz do usuniecia
                if(edgeToRemove.getStartNode() == node || edgeToRemove.getEndNode() == node)
                    found = true;

            }while(!found);

            edgeIterator.remove();
            found=false;
        }
    }

    /**
     * Metoda dodajaca krawedz do grafu
     * @param edge Instancja klasy Edge
     */
    public void addEdge(Edge edge)
    {
        edges.add(edge);
    }

    /**
     * Metoda usuwajaca krawedz z grafu
     * @param edge Instancja klasy Edge
     */
    public void removeEdge(Edge edge)
    {
        edges.remove(edge);
    }

    /**
     * Metoda zwracajaca liste wszystkich wezlow grafu
     * @return Lista obiektow klasy Node
     */
    public ArrayList<Node> getNodes()
    {
        return (ArrayList<Node>) nodes;
    }

    /**
     * Metoda zwracajaca liste wszystkich krawedzi grafu
     * @return Lista obiektow klasy Edge
     */
    public ArrayList<Edge> getEdges()
    {
        return (ArrayList<Edge>) edges;
    }

    /**
     * Metoda pozwalajaca zapisanie grafu do pliku binarnego
     * @param fileName Nazwa pliku
     * @param graph Obiekt grafu do zapisania
     * @throws Exception
     */
    public static void printToFile(String fileName, Graph graph) throws Exception
    {
        try (ObjectOutputStream out = new ObjectOutputStream(new FileOutputStream(fileName)))
        {
            out.writeObject(graph);

        } catch (FileNotFoundException e)
        {
            throw new Exception("Nie odnaleziono takiego pliku");
        }
        catch (IOException e)
        {
            throw new Exception("Wystapil niezidentyfikowany blad przy zapisie :(");
        }
    }

    /**
     * Metoda pozwalajaca odczytanie grafu z pliku binarnego
     * @param fileName Nazwa pliku
     * @return Wczytany obiekt grafu
     * @throws Exception
     */
    public static Graph readFromFile(String fileName) throws Exception
    {
        Graph graph;
        try (ObjectInputStream in = new ObjectInputStream(new FileInputStream(fileName)))
        {
            graph = (Graph)in.readObject();
            return graph;

        } catch (FileNotFoundException e)
        {
            throw new Exception("Nie odnaleziono takiego pliku");

        } catch (Exception e)
        {
            throw new Exception("Wystapil blad podczas odczytu danych z pliku");
        }
    }

    /**
     * Metoda rysujaca graf na plaszczyznie
     * @param g Instancja klasy Graphics
     */
    void draw(Graphics g)
    {
        Iterator edgesIterator = edges.iterator();
        while(edgesIterator.hasNext())
        {
            Edge edge = (Edge)edgesIterator.next();
            edge.draw(g);
        }

        Iterator nodesIterator = nodes.iterator();
        while(nodesIterator.hasNext())
        {
            Node node = (Node)nodesIterator.next();
            node.draw(g);
        }
    }

}
