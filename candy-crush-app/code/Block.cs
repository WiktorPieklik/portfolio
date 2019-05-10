using System.Collections;
using System.Collections.Generic;
using System.Linq;
using UnityEngine;

public enum BlockColor
{
    Red,
    Green,
    Blue,
    Gray,
    Magenta,
    Yellow
}

[System.Serializable]
class BlockType
{
    public Sprite Spirte;
    public BlockColor Color;
}

public class Block : MonoBehaviour
{
    [SerializeField]
    BlockType[] blockTypes;

    public BlockColor Color { get; private set; }
    public int X { get; private set; }
    public int Y { get; private set; }
    public bool IsConnected;

    private Vector3 TargetPosition;
    private Board Board;
    private ConnectingBlocks ConnectingBlocks;
    private SpriteRenderer SpriteRenderer;

    private void Awake()
    {
        Board = FindObjectOfType<Board>();
        ConnectingBlocks = FindObjectOfType<ConnectingBlocks>();
        SpriteRenderer = GetComponent<SpriteRenderer>();
    }

    // Start is called before the first frame update
    void Start()
    {
        Color = GetRandomColor();
        SetSprite();
    }

    // Update is called once per frame
    void Update()
    {
        UpdatePosition();
        UpdateScale();
        UpdateColor();
    }

    private void UpdatePosition()
    {
        transform.localPosition = Vector3.Lerp(transform.localPosition, TargetPosition, Time.deltaTime * 2f);
    }

    private void UpdateScale()
    {
        var scale = IsConnected? 0.8f : 1f;
        transform.localScale = Vector3.Lerp(transform.localScale, scale * Board.blockScale * Vector3.one, Time.deltaTime * 2f);
    }

    private void UpdateColor()
    {
        var color = IsConnected ? new Color(1f, 1f, 1f, 0.8f) : UnityEngine.Color.white;
        SpriteRenderer.color = UnityEngine.Color.Lerp(SpriteRenderer.color, color, Time.deltaTime * 2f);
    }

    private BlockColor GetRandomColor()
    {
        var values = System.Enum.GetValues(typeof(BlockColor));
        int index = Random.Range(0, values.Length);

        return (BlockColor)values.GetValue(index);
    }

    private void SetSprite()
    {
        var sprite = blockTypes.First(type => type.Color == Color).Spirte;
        SpriteRenderer.sprite = sprite;
    }

    public void Configure(int x, int y)
    {
        X = x;
        Y = y;

        TargetPosition = Board.GetFixedPosition(x, y);
        IsConnected = false;
    }

    private void OnMouseDown()
    {
        ConnectBlock();
    }

    private void OnMouseEnter()
    {
        ConnectBlock();
    }

    public bool IsNeighbour(Block other)
    {
        if (Mathf.Abs(X - other.X) > 1)
            return false;
        if (Mathf.Abs(Y - other.Y) > 1)
            return false;

        return true;
    }

    private void ConnectBlock()
    {
        ConnectingBlocks.Connect(this);
    }

    public void MoveToTargetPosition()
    {
        transform.localPosition = TargetPosition;
        transform.localScale = Vector3.zero;
        SpriteRenderer.color = new Color(1f, 1f, 1f, 0f);
    }
}
