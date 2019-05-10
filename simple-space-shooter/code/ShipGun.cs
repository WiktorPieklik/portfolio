using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[RequireComponent(typeof(AudioSource))]
public class ShipGun : MonoBehaviour, IUpgradable
{
    [SerializeField]
    AudioClip FireClip;

    [SerializeField]
    AudioClip ShipDestroyedClip;

    [SerializeField]
    GameObject BulletPrefab;

    BulletType BulletType
    {
        get
        {
            return BulletTypes[CurrentLevel];
        }
    }

    [SerializeField]
    BulletType[] BulletTypes;

    float LastShootTime = 0f;
    private AudioSource AudioSource;

    #region IUpgradable

    public int MaxLevel
    {
        get
        {
            return BulletTypes.Length - 1;
        }
    }

    public int CurrentLevel { get; set; }

    public int UpgradeCost
    {
        get
        {
            return CurrentLevel * 100 + 25;
        }
    }

    public void Upgrade()
    {
        CurrentLevel++;
    }


    #endregion

    // Start is called before the first frame update
    void Start()
    {
        AudioSource = GetComponent<AudioSource>();
        AudioSource.clip = FireClip;
    }

    // Update is called once per frame
    void Update()
    {
        if (!Input.GetMouseButton(0))
            return;
        if (!CanShootBullet())
            return;

        ShootBullets();
    }

    private void ShootBullets()
    {
        if(BulletType.CannonType == CannonType.Single)
            ShootBullet(Vector3.zero, Vector3.zero);

        else if (BulletType.CannonType == CannonType.Double)
        {
            ShootBullet(Vector3.left * 0.1f, Vector3.forward * 5f);
            ShootBullet(Vector3.right * 0.1f, Vector3.back * 5f);
        }

        else if (BulletType.CannonType == CannonType.Triple)
        {
            ShootBullet(Vector3.left * 0.1f, Vector3.forward * 15f);
            ShootBullet(Vector3.zero, Vector3.zero);
            ShootBullet(Vector3.right * 0.1f, Vector3.back * 15f);
        }

        AudioSource.Play();
        LastShootTime = Time.timeSinceLevelLoad;
    }

    private void ShootBullet(Vector3 position, Vector3 rotation)
    {
        var bullet = Instantiate(
            BulletPrefab,
            transform.position + position + Vector3.up * 0.75f,
            Quaternion.Euler(rotation)); //przechylenie pocisku
        bullet.GetComponent<Bullet>().Configure(BulletType);
        
    }

    private bool CanShootBullet()
    {
        return Time.timeSinceLevelLoad - LastShootTime >= BulletType.ShootingDuration;
                    //czas od ostatniej klatki
    }
}
