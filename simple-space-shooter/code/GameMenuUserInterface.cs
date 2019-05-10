using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class GameMenuUserInterface : MonoBehaviour
{
    [SerializeField]
    Text LastResultCounter;

    [SerializeField]
    Text RecordCounter;


    // Start is called before the first frame update
    void Start()
    {
        LastResultCounter.text = "Points: " + GameState.GetLastResult();
        RecordCounter.text = "Record: " + GameState.GetRecord().ToString();
    }

}
