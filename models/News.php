<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $timestamp
 * @property int|null $idCategory
 * @property int|null $idUser
 * @property string|null $photo
 *
 * @property Category $idCategory0
 * @property User $idUser0
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'idCategory', 'idUser'], 'default', 'value' => null],
            [['id', 'idCategory', 'idUser'], 'integer'],
            [['description'], 'string'],
            [['timestamp'], 'safe'],
            [['name', 'photo'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['idCategory' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'timestamp' => 'Timestamp',
            'idCategory' => 'Id Category',
            'idUser' => 'Id User',
            'photo' => 'Photo',
        ];
    }

    /**
     * Gets query for [[IdCategory0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory0()
    {
        return $this->hasOne(Category::class, ['id' => 'idCategory']);
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::class, ['id' => 'idUser']);
    }
}
