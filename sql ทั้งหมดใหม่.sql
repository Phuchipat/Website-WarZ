
CREATE TABLE [dbo].[Z_TopupLog] (
[historid] int NOT NULL IDENTITY(1,1) ,
[email] varchar(256) COLLATE Thai_CI_AS NULL ,
[customerid] int NOT NULL ,
[topup] int NOT NULL ,
[card] varchar(14) COLLATE Thai_CI_AS NULL ,
[topuptime] datetime NOT NULL ,
[detail] varchar(256) COLLATE Thai_CI_AS NULL 
)
ON [PRIMARY]
GO

DBCC CHECKIDENT(N'[dbo].[Z_TopupLog]', RESEED, 26)
GO

CREATE TABLE [dbo].[Z_LOGHERO_WEBSHOP] (
[historid] int NOT NULL IDENTITY(1,1) ,
[email] varchar(256) COLLATE Thai_CI_AS NULL ,
[customerid] int NOT NULL ,
[topup] int NOT NULL ,
[card] varchar(14) COLLATE Thai_CI_AS NULL ,
[topuptime] datetime NOT NULL ,
[detail] varchar(256) COLLATE Thai_CI_AS NULL 
)
ON [PRIMARY]
GO
DBCC CHECKIDENT(N'[dbo].[Z_LOGHERO_WEBSHOP]', RESEED, 26)
GO


CREATE TABLE [dbo].[Codeitem] (
[Used] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS NULL ,
[itemcode] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS NULL ,
[Quantity] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS NULL ,
[code] varchar(255) COLLATE SQL_Latin1_General_CP1_CI_AS NULL 
)
ON [PRIMARY]
GO



