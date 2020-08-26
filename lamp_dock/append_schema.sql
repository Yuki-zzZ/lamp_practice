-- 購入履歴 ---------------------------------------------------------------------------------

CREATE TABLE `purchase_histories` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT date("Y-m-d H:i:s"),
  `updated` datetime NOT NULL DEFAULT date("Y-m-d H:i:s") ON UPDATE date("Y-m-d H:i:s"),
  PRIMARY KEY (purchase_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `purchase_details` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT date("Y-m-d H:i:s"),
  `updated` datetime NOT NULL DEFAULT date("Y-m-d H:i:s") ON UPDATE date("Y-m-d H:i:s"),
  PRIMARY KEY (detail_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;