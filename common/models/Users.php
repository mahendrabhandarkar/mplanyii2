<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class Users extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class' => BlameableBehavior::class,
                
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
			[['id', 'activated', 'banned', 'last_login', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email', 'mobile_no', 'profile_for', 'gender', 'dob', 'ban_reason', 'new_password_key', 'new_password_requested', 'new_email', 'new_email_key', 'last_ip', 'firstname', 'lastname', 'auth_key', 'password_hash', 'password_reset_token', 'verification_token'], 'safe'],
			['dob', 'date', 'max' => date('d-m-Y', mktime(0, 0, 0, date("m")  , date("d"), date("Y")-18))],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getUserAlbum()
    {
        return $this->hasOne(UserAlbum::class, ['user_id'=>'id']);
    }

    public function getUserAutologin()
    {
        return $this->hasOne(UserAutologin::class, ['user_id'=>'id']);
    }

    public function getUserBackground()
    {
        return $this->hasOne(UserBackground::class, ['user_id'=>'id']);
    }

    public function getUserEdu()
    {
        return $this->hasOne(UserEdu::class, ['user_id'=>'id']);
    }

    public function getUserFamily()
    {
        return $this->hasOne(UserFamily::class, ['user_id'=>'id']);
    }

    public function getUserFile()
    {
        return $this->hasOne(UserFile::class, ['user_id'=>'id']);
    }

    public function getUserfolder()
    {
        return $this->hasOne(Userfolder::class, ['user_id'=>'id']);
    }

    public function getUserHobbies()
    {
        return $this->hasOne(UserHobbies::class, ['user_id'=>'id']);
    }

    public function getUserLifestyle()
    {
        return $this->hasOne(UserLifestyle::class, ['user_id'=>'id']);
    }

    public function getUserProfiles()
    {
        return $this->hasOne(UserProfiles::class, ['user_id'=>'id']);
    }

    public function getUserSearch()
    {
        return $this->hasOne(UserSearch::class, ['user_id'=>'id']);
    }
	
    public function getAuthAssignment()
    {
        return $this->hasOne(AuthAssignment::class, ['user_id'=>'id']);
    }

    public function getFullName()
    {
        return $this->firstname." ".$this->lastname;
    }

	public function afterFind() {
		parent::afterFind();
		$this->dob=Yii::$app->formatter->asDate($this->dob);
		$this->created_at=Yii::$app->formatter->asDate($this->created_at);
		$this->updated_at=Yii::$app->formatter->asDate($this->updated_at);
	}

	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			$this->dob=Yii::$app->formatter->asTimestamp($this->dob);
			$this->created_at = Yii::$app->formatter->asTimestamp($this->created_at);
			$this->updated_at = Yii::$app->formatter->asTimestamp($this->updated_at);
			return true;
		} else {
			return false;
		}
	}
}
