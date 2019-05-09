package graphEditor;

import java.awt.Color;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

import javax.swing.*;

/*
 * Plik: GraphEditor.java
 * 	     Zawiera GUI calego programu, zawiera obsluge zmian grafu (klase GraphPanel)
 * Autor: Wiktor Pieklik
 * Data: listopad 2018
 */
public class GraphEditor extends JFrame implements ActionListener
{
    private static final long serialVersionUID = 1L;
    private String author = "Wiktor Pieklik\n"
            + "listopad 2018\n";

    private String manual = "Program zostal swtorzony do edycji grafow.\n\n"
            + "1.  Nacisniecie ktorejs ze strzalek na klawiaturze powoduje przesuniecie calego grafu w odpowiednim kierunku.\n"
            + "2.  Nacisniecie strzalki z wcisnietym klawiszem Shift powoduje szybsze przesuwanie grafu.\n"
            + "3.  Jesli najedziemy kursorem myszy na kolorowy wezel i nacisniemy r, g lub b to koloe wezla\n"
            + "odpowiednio zmieni sie na kolor czerwony, zielony lub niebieski.\n"
            + "4.  Aby przesunac ktorys z elementow grafu wystarczy najechac na ten element myszka, nacisnac lpm\n"
            + "i przesuna ten element w wybrane miejsce.\n"
            + "5.  Aby edytowac kolorowe krawedzie lub wezly nalezy najechac na nie kursorem myszy i wcisnac ppm\n"
            + "i wybrac jedna z dostepnych opcji.\n\n"
            + "Wiktor Pieklik 2018";

    private JMenuBar menuBar;
    private JMenu mainMenu;
    private JMenu graphMenu;
    private JMenu aboutMenu;

    private JMenuItem[] mainMenuItems;
    private JMenuItem[] aboutMenuItems;
    private JMenuItem[] graphMenuItems;

    private GraphPanel graphPanel = new GraphPanel();

    public static void main (String[] args)
    {
        new GraphEditor();
    }

    public GraphEditor()
    {
        super("Edytor grafow");
        initViews();
        prepareGraphEditor();
    }

    private void initViews()
    {
        menuBar = new JMenuBar();
        mainMenu = new JMenu("Plik");
        graphMenu = new JMenu("Graf");
        aboutMenu = new JMenu("Pomoc");

        mainMenuItems = new JMenuItem[]
                {
                        new JMenuItem("Nowy graf"),
                        new JMenuItem("Przykladowy graf"),
                        new JMenuItem("Wczytaj z pliku"),
                        new JMenuItem("Zapisz do pliku"),
                        new JMenuItem("Zakoncz")
                };

        aboutMenuItems = new JMenuItem[]
                {
                        new JMenuItem("O autorze"),
                        new JMenuItem("Instrukcja")
                };

        graphMenuItems = new JMenuItem[]
                {
                        new JMenuItem("Lista wezlow"),
                        new JMenuItem("Lista krawedzi")
                };
    }

    private void prepareGraphEditor()
    {
        setDefaultCloseOperation(DISPOSE_ON_CLOSE);
        setSize(600,600);

        for(JMenuItem item : mainMenuItems)
        {
            item.addActionListener(this);
            mainMenu.add(item);
        }

        for(JMenuItem item : aboutMenuItems)
        {
            item.addActionListener(this);
            aboutMenu.add(item);
        }

        for(JMenuItem item : graphMenuItems)
        {
            item.addActionListener(this);
            graphMenu.add(item);
        }

        menuBar.add(mainMenu);
        menuBar.add(graphMenu);
        menuBar.add(aboutMenu);

        setJMenuBar(menuBar);
        createExample();
        setContentPane(graphPanel);
        setLocationRelativeTo(null);
        setDefaultCloseOperation(WindowConstants.EXIT_ON_CLOSE);
        setVisible(true);
    }

    private void createExample()
    {
        Graph graph = new Graph();
        List<ColoredNode> colorNodes = new ArrayList<ColoredNode>() ;
        colorNodes = Arrays.asList(new ColoredNode(150, 150, "LG", Color.BLUE), new ColoredNode(150,450,"LD",Color.DARK_GRAY), new ColoredNode(450,150,"PG",Color.CYAN), new ColoredNode(450,450,"PD", Color.GREEN));
        Node standardNode = new Node(300,300);
        List<ColoredEdge> colorEdges = new ArrayList<ColoredEdge>();
        colorEdges = Arrays.asList(new ColoredEdge(colorNodes.get(0), colorNodes.get(1), Color.MAGENTA), new ColoredEdge(colorNodes.get(1), colorNodes.get(3), Color.BLUE), new ColoredEdge(colorNodes.get(3), colorNodes.get(2), Color.CYAN), new ColoredEdge(colorNodes.get(2), colorNodes.get(0), Color.gray));
        Edge standardEdge = new Edge(standardNode, colorNodes.get(1));

        for(ColoredNode nodes : colorNodes)
            graph.addNode(nodes);
        graph.addNode(standardNode);

        for(ColoredEdge edge : colorEdges)
            graph.addEdge(edge);
        graph.addEdge(standardEdge);
        graphPanel.setGraph(graph);
    }

    private void showListOfNodes()
    {
        ArrayList<Node> nodes = graphPanel.getGraph().getNodes();
        StringBuilder sb = new StringBuilder("Ilosc wezlow: " + nodes.size() + "\n\n");
        for(Node node : nodes)
            sb.append(node + " " + "\n");

        JOptionPane.showMessageDialog(this, sb, "Lista wezlow", JOptionPane.INFORMATION_MESSAGE);
    }

    private void showListOfEdges()
    {
        ArrayList<Edge> edges = graphPanel.getGraph().getEdges();
        StringBuilder sb = new StringBuilder("Ilosc krawedzi: " + edges.size() + "\n\n");
        for(Edge edge : edges)
            sb.append(edge + " " + "\n\n");

        JOptionPane.showMessageDialog(this, sb, "Lista krawedzi", JOptionPane.INFORMATION_MESSAGE);
    }

    @Override
    public void actionPerformed(ActionEvent event)
    {
        Object source = event.getSource();

        //nowy graf
        if(source == mainMenuItems[0])
            graphPanel.setGraph(new Graph());

        //przykladowy graf
        if(source == mainMenuItems[1])
            createExample();

        //wczytanie z pliku
        if(source == mainMenuItems[2])
        {
            JFileChooser fileChooser = new JFileChooser();
            if(fileChooser.showOpenDialog(null) == JFileChooser.APPROVE_OPTION)
            {
                try
                {
                    graphPanel.setGraph(Graph.readFromFile(fileChooser.getSelectedFile().getAbsolutePath()));
                } catch (Exception e)
                {
                    // TODO Auto-generated catch block
                    e.printStackTrace();
                }
            }
        }

        //zapisanie do pliku
        if(source == mainMenuItems[3])
        {
            JFileChooser chooser = new JFileChooser();
            if(chooser.showSaveDialog(null) == JFileChooser.APPROVE_OPTION)
            {
                try
                {
                    Graph.printToFile(chooser.getSelectedFile().getAbsolutePath(), graphPanel.getGraph());
                } catch (Exception e)
                {
                    // TODO Auto-generated catch block
                    e.printStackTrace();
                }
            }
        }

        //zakonczenie programu
        if(source == mainMenuItems[4])
            System.exit(0);

        //wyswietlenie info o autorze
        if(source == aboutMenuItems[0])
            JOptionPane.showMessageDialog(this, author, "O autorze", JOptionPane.INFORMATION_MESSAGE);
        //wyswietlenie instrukcji
        if(source == aboutMenuItems[1])
            JOptionPane.showMessageDialog(this, manual, "Instrukcja obslugi", JOptionPane.INFORMATION_MESSAGE);

        //wyswietlenie listy wezlow
        if(source == graphMenuItems[0])
            showListOfNodes();

        //wyswietlenie listy krawedzi
        if(source == graphMenuItems[1])
            showListOfEdges();

    }

}
