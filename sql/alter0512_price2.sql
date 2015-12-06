ALTER TABLE `oc_product`
ADD COLUMN `price2`  decimal(15,4) NULL DEFAULT 0.0000 AFTER `price`;