
DROP SCHEMA IF EXISTS `vox` ;

CREATE SCHEMA `vox` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `vox`.`languages` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `languageName` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `vox`.`vocabularies` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `language1_id` INT(11) NOT NULL,
  `language2_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fkl1_idx` (`language1_id` ASC),
  INDEX `fkl2_idx` (`language2_id` ASC),
  CONSTRAINT `fkl1`
    FOREIGN KEY (`language1_id`)
    REFERENCES `vox`.`languages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkl2`
    FOREIGN KEY (`language2_id`)
    REFERENCES `vox`.`languages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `vox`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(45) NOT NULL,
  `lastName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `vox`.`classAssignments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `voc_id` INT(11) NOT NULL,
  `description` VARCHAR(1000) NULL DEFAULT NULL,
  `dueDate` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fkvoc_idx` (`voc_id` ASC),
  CONSTRAINT `fkvoc`
    FOREIGN KEY (`voc_id`)
    REFERENCES `vox`.`vocabularies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `vox`.`personalAssignments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `classAssignment_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `doneDate` DATETIME NULL DEFAULT NULL,
  `result` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fktest_idx` (`classAssignment_id` ASC),
  INDEX `fkuser_idx` (`user_id` ASC),
  CONSTRAINT `fktest`
    FOREIGN KEY (`classAssignment_id`)
    REFERENCES `vox`.`classAssignments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fkuser`
    FOREIGN KEY (`user_id`)
    REFERENCES `vox`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `vox`.`words` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `value1` VARCHAR(300) NOT NULL,
  `value2` VARCHAR(300) NOT NULL,
  `vocabulary_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fkvoc_idx` (`vocabulary_id` ASC),
  CONSTRAINT `fkwordvoc`
    FOREIGN KEY (`vocabulary_id`)
    REFERENCES `vox`.`vocabularies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

USE `vox`;

INSERT INTO languages (languageName) VALUES ('Français'),('Anglais');

INSERT INTO vocabularies (title, language1_id, language2_id) VALUES
("Les Couleurs",1,2),
("Le Restaurant",1,2),
("Les affaires",1,2),
("L\u0027art",1,2);

INSERT INTO words (value1, value2, vocabulary_id) VALUES
("blanc","white",1),
("bleu","blue",1),
("bleu clair","light blue",1),
("bleu foncé","dark blue",1),
("multicolore","muli-colored",1),
("rose","pink",1),
("gris","grey",1),
("rouge","red",1),
("vert","green",1),
("marron","brown",1),
("noir","black",1),
("violet","purple",1),
("argenté","silver",1),
("beige","beige",1),
("jaune","yellow",1),
("turquoise","turquoise",1),
("orange","orange",1),
("doré","golden",1),
("bordeaux","maroon",1);

INSERT INTO words (value1, value2, vocabulary_id) VALUES
("le garçon","the waiter",2),
("la serveuse","the waitress",2),
("bon appétit","enjoy your meal",2),
("une réservation","reservation",2),
("la carte","menu",2),
("les spécialités","specialities",2),
("le pourboire","tip/gratuity",2),
("l\u0027addition","bill",2),
("le menu","set menu",2),
("voilà!","here you go/here it is!",2),
("les ingrédients","ingredients",2),
("le service","the service",2),
("une boisson","beverage",2),
("le repas","meal",2),
("le verre","glass",2),
("le plat","dish",2),
("brûlé","burnt",2),
("froid","cold",2),
("épicé","spicy",2),
("la soupe","soup",2),
("les entrées","entrees",2),
("la salade","salad",2),
("le plat principal","main dish",2),
("le dessert","dessert",2),
("l\u0027apéritif","aperitif",2);

INSERT INTO words (value1, value2, vocabulary_id) VALUES
("les affaires","business",3),
("l\u0027homme d\u0027affaires","businessman",3),
("la femme d\u0027affaires","business woman",3),
("le voyage d‘affaires","business trip",3),
("le déjeuner d\u0027affaires","business lunch",3),
("le client","client",3),
("le contrat","business deals",3),
("le directeur général","managing director",3),
("le chef","boss",3),
("le rendez-vous","meeting",3),
("l\u0027ordinateur de poche","handheld computer",3),
("le portable","laptop",3),
("les notes","notes",3),
("la société","company",3),
("le personnel","staff/employees",3),
("le siège social","head office",3),
("la succursale","branch",3),
("le salaire","salary",3),
("le livre de paie","payroll",3),
("le service marketing","marketing department",3),
("les services de vente","sales department",3),
("la comptabilité","accounting department",3),
("le service de contentieux","legal department",3),
("le service de ressources humaines","human resources department",3),
("la gestion/direction","management",3),
("les honoraires","fees",3),
("un entretien","interview",3),
("la formation","training",3),
("le poste","post/job",3),
("l\u0027acheteur","buyer",3),
("le vendeur","seller",3),
("l\u0027associé","partner",3),
("le bail","lease/rental contract",3),
("le bénéfice","profit",3),
("les biens","assets",3),
("brut","gross",3),
("le chiffre d\u0027affaire","sales/turnover",3),
("le chef d\u0027entreprise","boss of the company",3),
("le concurrent","competitor",3),
("la compte","account",3),
("la direction","management",3),
("l\u0027entrepreneur","entrepreneur",3),
("l\u0027étude de marché","market study",3),
("faire faillite","to go bankrupt",3),
("les frais","fees",3),
("la gérance","management",3),
("la gestion","management",3),
("l\u0027impôt","tax",3),
("la liquidation","liquidation",3),
("la location","rental",3),
("le main-d\u0027oeuvre","workforce",3),
("le paiement","payment",3),
("la perte","loss",3),
("la société anonyme","limited company",3);

INSERT INTO words (value1, value2, vocabulary_id) VALUES
("l\u0027art","art",4),
("les arts et métiers","arts and crafts",4),
("l\u0027artist","artist",4),
("l\u0027artiste peintre","artist/painer",4),
("le tableau","painting",4),
("la toile","canvas",4),
("le chevalet","easel",4),
("la peinture","peinting",4),
("le pinceau","brush",4),
("la palette","palette",4),
("les couleurs","paints/colors",4),
("les peintures à l\u0027huile","oil paints",4),
("l\u0027aquarelle watercolor","paint",4),
("les pastels","pastels",4),
("l\u0027acrylique","acrylic paint",4),
("la gouache","poster paint",4),
("le dessin","drawing",4),
("le crayon","pencil",4),
("le fusain","charcoal",4),
("l\u0027encre","ink",4),
("le croquis","sketch",4),
("le carnet à croquis","sketch pad",4),
("l\u0027imprimerie","printing",4),
("la gravure","engraving",4),
("la sculpture","sculpting",4),
("le maillet","mallet",4),
("la pierre","stone",4),
("la scupture sur bois","woodworking",4),
("le bois","wood",4),
("le burin","chisel",4),
("la poterie ","pottery",4),
("l\u0027argile","clay",4),
("le tour de potier","potter\u0027s wheel",4),
("la spatule","modelling tool",4),
("la joaillerie","jewelery making",4),
("le paper mâché","paper mâché",4),
("l\u0027origami","origami",4),
("le modélisme","model making",4);