<?php
/**
* Class for handling issuing and decoding of the jwt token
* @uses Firebase/Jwt
* @version 1.0
*/
use \Firebase\JWT\JWT;
class Auth {

  public function issue_token( $uid ) {
  /**
  * Issue a new token to a user.
  * @param { $uid } User id or some uniq value to identify the user.
  * @global {ISS}, {AUD}, {TOKENKEY}
  * @return Encoded JWT token.
  */

    # Create token values
    $token = array(
      "iss"   => ISS, // Issued, normaly the domain name
      "aud"   => AUD, // Audiance, normaly domain name, or some other adience type.
      "iat"   => time(), // Time for the creation of the JWt token.
      "nbf"   => time(), // Not before, sets the time the token starts to be valid.
      "uid"   => $uid, // The uniq identifyer for your user.
      "exp"   => time() * ( 30 * 24 * 60 * 60 ) // Experation time, default is one month.
    );

    # Return the JWT toke string.
    return $jwt = JWT::encode( $token, TOKENKEY );
  }

  public function decode_token( $token ) {
  /**
  * Decodes an existing token
  * @param {$token}
  * @global {TOKENKEY}
  * @return decoded userid on success.
  */

    # Try to decode the token
    try {

      # Token is valid, and decoed propperly.
      $decoded = JWT::decode( $token, TOKENKEY, array( 'HS256' ) );

      # Return the decoded token uid.
      return $decoded->uid;

    } catch (Exception $e) {
      # Token could not be decoded.
      return false;
    }

  }

}
