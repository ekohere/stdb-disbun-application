/*
 Navicat Premium Data Transfer

 Source Server         : PG STDB Server New
 Source Server Type    : PostgreSQL
 Source Server Version : 140001
 Source Host           : localhost:5432
 Source Catalog        : stdb
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 140001
 File Encoding         : 65001

 Date: 31/01/2022 16:19:08
*/


-- ----------------------------
-- Table structure for polygon_persil
-- ----------------------------
DROP TABLE IF EXISTS "public"."polygon_persil";
CREATE TABLE "public"."polygon_persil" (
  "id" int4 NOT NULL DEFAULT nextval('polygon_persil_id_0_seq'::regclass),
  "geom" "public"."geometry",
  "area" float8,
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "geom_cc_apl" "public"."geometry",
  "geom_cc_rtrw" "public"."geometry",
  "area_cc_apl" float8,
  "area_cc_rtrw" float8
)
;
ALTER TABLE "public"."polygon_persil" OWNER TO "user_stdb";

-- ----------------------------
-- Records of polygon_persil
-- ----------------------------
BEGIN;
INSERT INTO "public"."polygon_persil" VALUES (79, '0103000020E6100000010000000800000000000000872E5D40E043DD798DF2F73F010000001C305D4059E329FE0E58F63F00000000A3305D40E43414743D93F53F0100000016365D40FAFF7550B503F63FFFFFFFFFE8355D4003C56B02996BF73FFFFFFFFFF9335D400AD4EEE8207FF83FFFFFFFFFB32E5D404EF0F3533E9BF83F00000000872E5D40E043DD798DF2F73F', 20543.03994505954, '2022-01-18 10:28:40', '2022-01-18 10:28:40', NULL, NULL, NULL, NULL);
INSERT INTO "public"."polygon_persil" VALUES (80, '0103000020E610000001000000050000000100008013315D4031E8EC6F1F77F53F00000040A02F5D40B6997CA77C9EF53FFFFFFFFFB32E5D40A9F995983158F53F000000C0A5315D40346C16088617F53F0100008013315D4031E8EC6F1F77F53F', 898.4781299728423, '2022-01-18 10:28:40', '2022-01-18 10:28:40', NULL, NULL, NULL, NULL);
INSERT INTO "public"."polygon_persil" VALUES (2, '0103000020E61000000100000008000000C744EFF9862E5D405E08DE358DF2F73F6F2821FD1B305D40ABB6F6990E58F63FA7C931FEA2305D40CF62CED83C93F53FBF677FFB15365D40327216F6B403F63FBEBC00FBE8355D4088BE164F986BF73F86DFF2FDF9335D40BA9CB756207FF83FC8EF6DFAB32E5D405E4BC8073D9BF83FC744EFF9862E5D405E08DE358DF2F73F', 20542.994688417653, '2022-01-28 07:53:23', '2022-01-28 07:53:23', NULL, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Primary Key structure for table polygon_persil
-- ----------------------------
ALTER TABLE "public"."polygon_persil" ADD CONSTRAINT "polygon_persil_pkey" PRIMARY KEY ("id");
