<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id_order_item
 * @property int $id_barang
 * @property int $id_order
 * @property int $quantity
 * @property int $jumlah_harga
 *
 * @property Barang $barang
 * @property Orders $order
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang', 'id_order', 'quantity', 'jumlah_harga'], 'required'],
            [['id_barang', 'id_order', 'quantity', 'jumlah_harga'], 'integer'],
            [['id_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['id_barang' => 'id_barang']],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['id_order' => 'id_order']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order_item' => 'Id Order Item',
            'id_barang' => 'Id Barang',
            'id_order' => 'Id Order',
            'quantity' => 'Quantity',
            'jumlah_harga' => 'Jumlah Harga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id_barang' => 'id_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id_order' => 'id_order']);
    }
}
