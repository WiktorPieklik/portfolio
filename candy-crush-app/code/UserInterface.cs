using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class UserInterface : MonoBehaviour
{
    [SerializeField]
    Numbers TimeCounter;

    [SerializeField]
    Numbers ScoreCounter;


    // Start is called before the first frame update
    void Start()
    {
        FindObjectOfType<GameManager>().OnRemainingTimeChanged += (time) =>
        {
            TimeCounter.Value = time;
        };

        FindObjectOfType<GameManager>().OnScoreChanged += (score) =>
        {
            ScoreCounter.Value = score;
        };
    }

    
}
