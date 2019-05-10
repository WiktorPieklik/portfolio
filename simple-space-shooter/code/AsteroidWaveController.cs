using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class AsteroidWaveController : MonoBehaviour
{

    [SerializeField]
    float WaveDuration = 25f;

    [SerializeField]
    float BreakDuration = 5f;

    [SerializeField]
    float CooldownDuration = 5f;

    public event System.Action<int> OnWaveStarted;
    public event System.Action<int> OnWaveEnded;

    public int CurrentWaveNumber { get; private set; }

    
    // Start is called before the first frame update
    void Start()
    {
        CurrentWaveNumber = 1;
        StartCoroutine(WaveControllerCoroutine());
    }

    private IEnumerator WaveControllerCoroutine()
    {
        var spawner = FindObjectOfType<AsteroidSpawner>();
        while(true)
        {
            OnWaveStarted?.Invoke(CurrentWaveNumber);
            spawner.AsteroidTypeLevel = CurrentWaveNumber;
            spawner.Spawning = true;

            yield return new WaitForSeconds(WaveDuration);

            spawner.Spawning = false;

            yield return new WaitForSeconds(CooldownDuration); //odczekanie az ostatnie asteroidy zostana zniszczone przez gracza
            OnWaveEnded?.Invoke(CurrentWaveNumber);

            yield return new WaitForSeconds(BreakDuration);

            CurrentWaveNumber++;
        }
    }
}
