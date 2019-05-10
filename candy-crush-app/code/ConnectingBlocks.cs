using System;
using System.Collections.Generic;
using System.Linq;
using UnityEngine;

public class ConnectingBlocks : MonoBehaviour
{
    List<Block> ConnectedBlocks = new List<Block>();
    private BlockColor? CurrentColor;
    private LineRenderer LineRenderer;
    private Board Board;
    public event Action<int> OnConnection;


    private void Awake()
    {
        LineRenderer = FindObjectOfType<LineRenderer>();
        Board = FindObjectOfType<Board>();
    }


    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        if (!Input.GetMouseButton(0))
            FinishConnecting();
    }

    public void Connect(Block block)
    {
        if (!Input.GetMouseButton(0))
            return;

        if (ConnectedBlocks.Contains(block))
            return;

        if (!CurrentColor.HasValue)
            CurrentColor = block.Color;

        if (CurrentColor != block.Color)
            return;

        if (ConnectedBlocks.Count >= 1 && !ConnectedBlocks.Last().IsNeighbour(block))
            return;


        block.IsConnected = true;
        ConnectedBlocks.Add(block);
        RefreshConnectingLine();
    }

    public void FinishConnecting()
    {
        ConnectedBlocks.ForEach(block => block.IsConnected = false);

        if (ConnectedBlocks.Count > 2)
          Board.RemoveBlocks(ConnectedBlocks);

        if (OnConnection != null)
            OnConnection.Invoke(ConnectedBlocks.Count);

        ConnectedBlocks.Clear();
        CurrentColor = null;
        RefreshConnectingLine();

    }

    public void RefreshConnectingLine()
    {
        var points = ConnectedBlocks.Select(block => Board.GetFixedPosition(block.X, block.Y))
                                    .Select(position => (Vector3)position + Vector3.back * 2f)
                                    .ToArray();
        LineRenderer.positionCount = points.Length;
        LineRenderer.SetPositions(points);

    }
}
