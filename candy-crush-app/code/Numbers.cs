using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using UnityEngine;

public enum TextDirection
{
    Left,
    Middle,
    Right
}

public class Numbers : MonoBehaviour
{
    List<GameObject> DigitObjects = new List<GameObject>();

    [SerializeField]
    Sprite[] Sprites;

    [SerializeField]
    TextDirection TextDirection;

    [SerializeField]
    float GridSize = 1f;

    private int _value = 0;
    public int Value
    {
        get
        {
            return _value;
        }
        set
        {
            _value = value;
            RefreshNumber();
        }
    }

    private void RefreshNumber()
    {
        RemoveDigits();

        var digits = Value.ToString()
                          .Select(c => int.Parse(c.ToString()))
                          .ToArray();

        for(int i=0;i<digits.Count(); i++)
        {
            var position = GetPosition(i, digits.Count());
            var digit = digits[i];
            DigitObjects.Add(CreateDigit(position, digit));
        }
    }

    private void RemoveDigits()
    {
        DigitObjects.ForEach(number => Destroy(number));
        DigitObjects.Clear();
    }

    private GameObject CreateDigit(Vector3 position, int value)
    {
        var digit = new GameObject();
        digit.transform.parent = transform;
        digit.transform.localPosition = position;

        var sprite = Sprites[value];
        digit.AddComponent<SpriteRenderer>().sprite = sprite;

        return digit;
    }

    private Vector3 GetPosition(int index, int numberOfDigits)
    {
        float result = 0;

        if(TextDirection == TextDirection.Right)
            result = index;

        else if(TextDirection == TextDirection.Middle)
            result = index - numberOfDigits / 2f + 0.5f;

        else if(TextDirection == TextDirection.Left)
            result = index - numberOfDigits + 1;

        return Vector3.right * result * GridSize;
    }
   
}
