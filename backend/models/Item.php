<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property int $id_barang
 * @property string $nama_barang
 * @property string $foto_barang
 * @property int $harga_barang
 * @property int $id_kategori
 * @property int $jumlah
 * @property string $deksripsi
 *
 * @property Kategori $kategori
 * @property Cart[] $carts
 * @property OrderItem[] $orderItems
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_barang', 'foto_barang', 'harga_barang', 'id_kategori', 'jumlah', 'deksripsi'], 'required'],
            [['harga_barang', 'id_kategori', 'jumlah'], 'integer'],
            [['deksripsi'], 'string'],
            [['nama_barang'], 'string', 'max' => 50],
            [['foto_barang'], 'string', 'max' => 70],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_kategori' => 'id_kategori']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_barang' => 'Id Barang',
            'nama_barang' => 'Nama Barang',
            'foto_barang' => 'Foto Barang',
            'harga_barang' => 'Harga Barang',
            'id_kategori' => 'Id Kategori',
            'jumlah' => 'Jumlah',
            'deksripsi' => 'Deksripsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id_kategori' => 'id_kategori']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['id_barang' => 'id_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['id_barang' => 'id_barang']);
    }
}
