using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Board : MonoBehaviour
{
    [SerializeField]
    GameObject BlockPrefab;

    public Block[,] Blocks { get; private set; }

    [SerializeField]
    [Range(3, 8)]
    int width = 5;

    [SerializeField]
    [Range(3, 10)]
    int height = 6;

    [SerializeField]
    [Range(0.5f, 5f)]
    float gridSize = 2f;

    [SerializeField]
    [Range(0.5f, 5f)]
    public float blockScale = 1f;






    // Start is called before the first frame update
    void Start()
    {
        GenerateBoard();
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    private void GenerateBoard()
    {
        Blocks = new Block[width, height];
        for (int x = 0; x < width; x++)
            for (int y = 0; y < height; y++)
                Blocks[x, y] = GenerateBlock(x, y);
    }

    private Block GenerateBlock(int x, int y)
    {
        var obj = Instantiate(BlockPrefab);
        obj.transform.parent = transform;
        obj.transform.localPosition = Vector3.zero;
        obj.transform.localScale = Vector3.one * blockScale;

        var block = obj.GetComponent<Block>();
        block.Configure(x, y);
        return block;
    }

    public Vector2 GetFixedPosition(int x, int y)
    {
        var basePosition = new Vector2(
            x - width / 2f + 0.5f,
            y - height / 2f + 0.5f);

        return basePosition * gridSize;
    }

    public void RemoveBlocks(List<Block> connectedBlocks)
    {
        connectedBlocks.ForEach(block => Blocks[block.X,block.Y] = null);
        connectedBlocks.ForEach(block => Destroy(block.gameObject));
        RefreshBlocks();
    }

    private void RefreshBlocks()
    {
        for(int x=0;x<width;x++)
        {
            int h = 0;
            for(int y=0;y<height;y++)
            {
                if (Blocks[x, y] == null)
                    continue;

                Blocks[x, h] = Blocks[x, y];
                Blocks[x, h].Configure(x, h);

                h++;
            }

            for(int y=h; y<height;y++)
            {
                Blocks[x, y] = GenerateBlock(x, y);
                Blocks[x, y].MoveToTargetPosition();
            }
        }
    }
}
