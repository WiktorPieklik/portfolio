using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public static class GameState
{
    public const string LastResult = "last_result";
    public const string Record = "record";


    public static void SetCurrentResult(int points)
    {
        PlayerPrefs.SetInt(LastResult, points);

        if (points > GetRecord())
            PlayerPrefs.SetInt(Record, points);
    }

    public static int GetLastResult()
    {
        return PlayerPrefs.GetInt(LastResult, 0);
    }

    public static int GetRecord()
    {
        return PlayerPrefs.GetInt(Record, 0);
    }

}
