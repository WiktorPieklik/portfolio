using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[RequireComponent(typeof(AudioSource))]
[RequireComponent(typeof(Collider2D))]
public class ShipShield : MonoBehaviour, IUpgradable
{
    [SerializeField]
    AudioClip AudioClipDestroy;

    [SerializeField]
    AudioClip AudioClipUpgrade;

    [SerializeField]
    Sprite[] ShieldStates;

    private AudioSource AudioSource;

    private void Awake()
    {
        FindObjectOfType<AsteroidWaveController>().OnWaveStarted += (number) =>
        {
            RebuildShield();
        };
    }

    private void Start()
    {
        AudioSource = GetComponent<AudioSource>();
    }


    bool Active
    {
        get
        {
            return CurrentState > 0;
        }
    }

    #region IUpgradable

    public int MaxLevel
    {
        get
        {
            return ShieldStates.Length - 1;
        }
    }

    public int CurrentLevel { get; private set; }

    public int UpgradeCost
    {
        get
        {
            return CurrentLevel * 100 + 100;
        }
    }

    public void Upgrade()
    {
        CurrentLevel++;

        SetAudioClip(false);
        AudioSource.Play();
        RebuildShield();
    }

    #endregion



    private int currentState = 0;
    public int CurrentState
    {
        get
        {
            return currentState;
        }

        set
        {
            currentState = Mathf.Clamp(value, 0, MaxLevel);
            UpdateSprite();
        }

    }

    private void OnTriggerEnter2D(Collider2D collision)
    {
        var asteroid = collision.gameObject.GetComponent<Asteroid>();

        if (asteroid == null)
            return;

        if (!Active)
            return;

        CurrentState--;

        SetAudioClip(true);
        AudioSource.Play();

        Destroy(asteroid.gameObject);
    }


    private void RebuildShield()
    {
        CurrentState = CurrentLevel;
    }


    private void UpdateSprite()
    {
        GetComponent<SpriteRenderer>().sprite = ShieldStates[CurrentState];
    }

    private void SetAudioClip(bool wasHit)
    {
        if (wasHit)
            AudioSource.clip = AudioClipDestroy;
        else
            AudioSource.clip = AudioClipUpgrade;
    }
}
