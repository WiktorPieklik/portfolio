using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public enum CannonType
{
    Single,
    Double,
    Triple
}

[System.Serializable]
public class BulletType
{
    public CannonType CannonType = CannonType.Single;
    public Sprite Sprite;
    public float ShootingDuration = 0.25f;
    public float BulletSpeed = 6f;
    public float Power = 1f;
}

[RequireComponent(typeof(Rigidbody2D))]
[RequireComponent(typeof(SpriteRenderer))]
public class Bullet : MonoBehaviour
{
    public float Power = 1f;
   

     public void Configure(BulletType bulletType)
    {
        Power = bulletType.Power;
        GetComponent<SpriteRenderer>().sprite = bulletType.Sprite;  
        GetComponent<Rigidbody2D>().velocity = transform.rotation * Vector2.up * bulletType.BulletSpeed;
    }

}
