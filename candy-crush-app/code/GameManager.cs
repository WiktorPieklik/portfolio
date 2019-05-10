using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class GameManager : MonoBehaviour
{
    [SerializeField]
    int GameDuration = 60;

    private int remainingTime;
    public int RemainingTime
    {
        get
        {
            return remainingTime;
        }

        set
        {
            remainingTime = value;

            if (remainingTime < 0)
                OnGameEnded();

            if (OnRemainingTimeChanged != null)
                OnRemainingTimeChanged.Invoke(remainingTime);
        }
    }

    private int score;
    public int Score
    {
        get
        {
            return score;
        }

        set
        {
            score = value;

            if (OnScoreChanged != null)
                OnScoreChanged.Invoke(score);
        }
    }


    public event Action<int> OnRemainingTimeChanged;
    public event Action<int> OnScoreChanged;



    // Start is called before the first frame update
    void Start()
    {
        Score = 0;
        RemainingTime = GameDuration;
        StartCoroutine(TimerCountDown());
        FindObjectOfType<ConnectingBlocks>().OnConnection += UpdateScore;
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    IEnumerator TimerCountDown()
    {
        while(true)
        {
            RemainingTime -= 1;
            yield return new WaitForSeconds(1f);
        }
    }

    private void UpdateScore(int length)
    {
        Score += length * length;
    }

    private void OnGameEnded()
    {
        PlayerPrefs.SetInt(PlayerPrefsConst.LastGameScore, Score);

        int record = PlayerPrefs.GetInt(PlayerPrefsConst.RecordScore, 0);

        if (record < Score)
            PlayerPrefs.SetInt(PlayerPrefsConst.RecordScore, Score);

        FindObjectOfType<SceneChanger>().ChangeScene(SceneNames.Menu);
    }
}
