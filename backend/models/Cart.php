<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id_cart
 * @property int $total
 * @property int $id_user
 * @property int $id_barang
 *
 * @property Barang $barang
 * @property User $user
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cart', 'total', 'id_user', 'id_barang'], 'required'],
            [['id_cart', 'total', 'id_user', 'id_barang'], 'integer'],
            [['id_cart'], 'unique'],
            [['id_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['id_barang' => 'id_barang']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cart' => 'Id Cart',
            'total' => 'Total',
            'id_user' => 'Id User',
            'id_barang' => 'Id Barang',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
